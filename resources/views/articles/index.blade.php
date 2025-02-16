@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <h1>Articles</h1>
        
        @if($articles->isEmpty())
            <p>No articles found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Revisions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>
                                <a href="{{ route('articles.revisions.index', $article) }}" class="btn btn-sm btn-info">
                                    View Revisions
                                </a>                                
                            </td>
                            <td>
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
