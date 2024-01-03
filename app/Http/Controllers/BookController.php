<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Validation - you can customize this based on your requirements
        $request->validate([
            'judul_buku' => 'required|string|max:255',
//            'penulis' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer',
        ]);

        // Create a new book
        $book = new Book;
        $book->judul_buku = $request->judul_buku;
//        $book->penulis = $request->penulis;
        $book->ISBN = $request->isbn;
        $book->penerbit = $request->penerbit;
        $book->jumlah_halaman = $request->jumlah_halaman;
        $book->user_id = auth()->user()->id; // Sesuaikan dengan kolom yang sesuai di tabel books

        // Save the book to the database
        $book->save();

        // You might want to redirect the user after saving
        return redirect()->route('dashboard.index')->with('success', 'Book added successfully!');
    }
    public function download($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found');
        }

        $filePath = storage_path('app/public/' . $book->file_path);

        if (!Storage::exists('app/public/' . $book->file_path)) {
            return redirect()->back()->with('error', 'File not found');
        }

        return Storage::download($filePath, $book->judul_buku . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
    }


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
