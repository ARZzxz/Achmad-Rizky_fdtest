@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Thumbnail URL</label>
            <input type="url" name="thumbnail" class="form-control" value="{{ old('thumbnail', $book->thumbnail) }}">
        </div>

        <div class="mb-3">
            <label>Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', $book->rating) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
