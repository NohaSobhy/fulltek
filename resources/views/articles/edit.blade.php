@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container">
    <h1>Edit Article</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('articles.update', $article) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $article->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea id="body" name="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Article</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
