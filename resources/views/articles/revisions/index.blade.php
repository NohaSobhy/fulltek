@extends('layouts.app')

@section('title', 'Revisions for: ' . $article->title)

@section('content')
    <div class="mb-4">
        <h1>Revisions for: {{ $article->title }}</h1>
        <a href="{{ route('articles.index', $article) }}" class="btn btn-secondary">Back to Articles</a>
    </div>

    @if($revisions->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Body</th>
                    <th>Revised At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($revisions as $revision)
                    <tr>
                        <td>{{ $revision->id }}</td>
                        <td>{{ $revision->title }}</td>
                        <td>{{ Str::limit($revision->description, 50) }}</td>
                        <td>{{ Str::limit($revision->body, 50) }}</td>
                        <td>
                            @if($revision->created_at)
                                {{ $revision->created_at->format('Y-m-d H:i:s') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('articles.revisions.show', ['article' => $article->id, 'revision' => $revision->id]) }}" class="btn btn-sm btn-info">View</a>

                            @if(auth()->id() === $article->user->id)
                                <form action="{{ route('articles.revisions.revert', ['article' => $article->id, 'revision' => $revision->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to revert to this revision?')">Revert</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No revisions found for this article.</p>
    @endif
@endsection
