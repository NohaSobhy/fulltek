@extends('layouts.app')

@section('title', 'Revision Details')

@section('content')
    <div class="mb-4">
        <h1>Revision #{{ $revision->id }} for: {{ $article->title }}</h1>
        <a href="{{ route('articles.revisions.index', $article) }}" class="btn btn-secondary">Back to Revisions</a>
    </div>

    <div class="card">
        <div class="card-header">
            Revision Details
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $revision->title }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $revision->description }}</p>
            <p><strong>Body:</strong></p>
            <p>{{ $revision->body }}</p>
            <p><strong>Revised At:</strong>
                @if($revision->created_at)
                    {{ $revision->created_at->format('Y-m-d H:i:s') }}
                @else
                    N/A
                @endif
            </p>
        </div>
    </div>

    @if(auth()->id() === $article->user->id)
        <div class="mt-4">
            <form action="{{ route('articles.revisions.revert', ['article' => $article->id, 'revision' => $revision->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to revert to this revision?')">Revert to this Revision</button>
            </form>
        </div>
    @endif
@endsection
