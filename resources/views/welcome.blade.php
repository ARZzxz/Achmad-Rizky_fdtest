<x-guest-layout>
    <div class="max-w-7xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Public Book List</h1>

        <form method="GET" class="mb-6 flex flex-wrap gap-4">
            <input type="text" name="author" placeholder="Filter by author" class="border p-2 rounded" value="{{ request('author') }}">
            
            <select name="rating" class="border p-2 rounded">
                <option value="">All Ratings</option>
                @for($i=1; $i<=5; $i++)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Star</option>
                @endfor
            </select>

            <input type="date" name="date" class="border p-2 rounded" value="{{ request('date') }}">

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Filter</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($books as $book)
                <div class="border p-4 rounded bg-white shadow">
                    @if($book->thumbnail)
                        <img src="{{ asset('storage/' . $book->thumbnail) }}" class="mb-2 rounded" />
                    @endif
                    <h2 class="font-bold text-lg">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-700">By {{ $book->author }}</p>
                    <p class="text-sm">Rating: {{ $book->rating }}</p>
                    <p class="text-sm">{{ Str::limit($book->description, 100) }}</p>
                </div>
            @empty
                <p>No books found.</p>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    </div>
</x-guest-layout>
