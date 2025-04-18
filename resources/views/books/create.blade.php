<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Book
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block">Title</label>
                    <input type="text" name="title" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block">Author</label>
                    <input type="text" name="author" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block">Description</label>
                    <textarea name="description" class="w-full border rounded p-2" rows="4" required></textarea>
                </div>

                <div>
                    <label class="block">Thumbnail</label>
                    <input type="file" name="thumbnail">
                </div>

                <div>
                    <label class="block">Rating (1-5)</label>
                    <input type="number" name="rating" min="1" max="5" class="w-full border rounded p-2" required>
                </div>

                <button class="px-4 py-2 bg-green-600 text-white rounded">Save Book</button>
            </form>
        </div>
    </div>
</x-app-layout>
