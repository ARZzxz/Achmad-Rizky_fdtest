<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">My Books</h2>
    </x-slot>

    <div class="mt-4">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
        @if(session('success'))
            <div class="text-green-600 mt-2">{{ session('success') }}</div>
        @endif
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>
                        @if($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" width="60" />
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->rating }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>
