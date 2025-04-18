@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
<div class="container">
    <h1 class="mb-4">All Books</h1>

    <form method="GET" class="row g-3 mb-4">
        <!-- filter form sama seperti sebelumnya -->
    </form>

    @if($books->count())
        <div class="row">
            @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($book->thumbnail)
                        <img src="{{ $book->thumbnail }}" class="card-img-top"
                             style="max-height: 200px; object-fit: contain;"
                             alt="Thumbnail">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">by <strong>{{ $book->author }}</strong></p>
                        <p class="card-text">Rating: {{ $book->rating }}/5</p>
                        <p class="card-text">
                          <small class="text-muted">
                            Uploaded at {{ $book->created_at->format('Y-m-d') }}
                          </small>
                        </p>
                        <p class="card-text">
                          Uploaded by: 
                          <strong>{{ optional($book->user)->name ?? 'Unknown User' }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $books->appends(request()->query())->links() }}
    @else
        <p>No books found.</p>
    @endif
</div>
@endsection