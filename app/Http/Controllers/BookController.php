<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', auth()->id())->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $data['user_id'] = auth()->id();
        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book added!');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($book->thumbnail) {
                Storage::disk('public')->delete($book->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Book updated!');
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

    public function public(Request $request)
    {
        $query = Book::query();

        if ($request->filled('author')) {
            $query->where('author', 'ILIKE', '%' . $request->author . '%');
        }

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $books = $query->latest()->paginate(6);

        return view('welcome', compact('books'));
    }
}
