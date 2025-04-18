@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book Details</h1>

    <div class="card mb-3">
        @if($book->thumbnail)
            <img src="{{ $book->thumbnail }}" class="card-img-top" alt="Thumbnail" style="max-height: 300px; object-fit: contain;">
        @endif
        <div class="card-body">
            <h3 class="card-title">{{ $book->title }}</h3>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Description:</strong><br>{{ $book->description }}</p>
            <p><strong>Rating:</strong> {{ $book->rating }}/5</p>
        </div>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
