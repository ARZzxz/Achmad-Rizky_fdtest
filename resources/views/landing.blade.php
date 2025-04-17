<x-guest-layout>
    <form method="GET">
        <input name="author" placeholder="Author">
        <input name="date" type="date">
        <select name="rating">
            <option value="">All Ratings</option>
            @for($i=1;$i<=5;$i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <button>Filter</button>
    </form>

    @foreach($books as $book)
        <div>
            <h3>{{ $book->title }}</h3>
            <p>{{ $book->author }}</p>
            <p>{{ $book->description }}</p>
            <p>Rating: {{ $book->rating }}</p>
            @if($book->thumbnail)
                <img src="{{ asset('storage/'.$book->thumbnail) }}" width="100" />
            @endif
        </div>
    @endforeach

    {{ $books->links() }}
</x-guest-layout>