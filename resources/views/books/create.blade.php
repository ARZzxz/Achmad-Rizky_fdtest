<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Book</h2>
    </x-slot>

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" class="input" value="{{ old('title') }}">
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" class="input" value="{{ old('author') }}">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" class="input">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Thumbnail</label>
            <input type="file" name="thumbnail">
        </div>
        <div>
            <label>Rating</label>
            <input type="number" name="rating" min="1" max="5" value="3">
        </div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</x-app-layout>
