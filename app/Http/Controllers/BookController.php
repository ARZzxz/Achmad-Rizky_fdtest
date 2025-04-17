<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::where('user_id', auth()->id());
        $books = $query->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $data['user_id'] = auth()->id();
        Book::create($data);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($book->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        if ($book->thumbnail) {
            Storage::disk('public')->delete($book->thumbnail);
        }
        $book->delete();
        return back()->with('success', 'Book deleted!');
    }

    public function landing(Request $request)
    {
        $books = Book::query()
            ->when($request->author, fn($q) => $q->where('author', $request->author))
            ->when($request->rating, fn($q) => $q->where('rating', $request->rating))
            ->when($request->date, fn($q) => $q->whereDate('created_at', $request->date))
            ->paginate(10);

        return view('landing', compact('books'));
    }
}
