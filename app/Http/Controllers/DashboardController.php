<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $articles = Article::all();
        $journals = Journal::all();
        return view('dashboard.index', compact('books','articles','journals'));
    }

    public function addbook()
    {
        return view('dashboard.addbook');
    }
    public function addArticle()
    {
        return view('dashboard.addarticle');
    }
    public function addJournal()
    {
        return view('dashboard.addjournal');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isbn' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'jumlah_halaman' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240'
            // Add other validation rules for your fields
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public', $fileName);

        // Create a new book instance
        $book = new Book();
        $book->judul_buku = $validatedData['judul'];
        $book->ISBN = $validatedData['isbn'];
        $book->penerbit = $validatedData['penerbit'];
        $book->jumlah_halaman = $validatedData['jumlah_halaman'];
        $book->file_path = $fileName;  // Save the file path
        $book->user_id = Auth::user()->id;

// Save the book to the database
//        $book->save();


        // Save the book to the database
        $book->save();

        // You can add a success message or redirection here
        return redirect()->route('dashboard.index')->with('success', 'Book added successfully');
    }
    public function storeArticle(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'judul_artikel' => 'required|max:255',
            'penulis' => 'required|max:255',
            'seminar_konferensi_simposium' => 'required|max:255',
            'penyelenggara_seminar_konferensi_simposium' => 'required|string',
            'waktu_pelaksanaan_seminar_konferensi_simposium' => 'required',
            'ISBN_ISSN'=>'required|string'
            // Add other validation rules for your fields
        ]);


        // Create a new book instance
        $article = new Article();
        $article->judul_artikel = $validatedData['judul_artikel'];
        $article->penulis = $validatedData['penulis'];
        $article->seminar_konferensi_simposium = $validatedData['seminar_konferensi_simposium'];
        $article->penyelenggara_seminar_konferensi_simposium = $validatedData['penyelenggara_seminar_konferensi_simposium'];
        $article->waktu_pelaksanaan_seminar_konferensi_simposium = $validatedData['waktu_pelaksanaan_seminar_konferensi_simposium'];
        $article->ISBN_ISSN = $validatedData['ISBN_ISSN'];
        $article->user_id = Auth::user()->id;

        // Save the book to the database
        $article->save();

        // You can add a success message or redirection here
        return redirect()->route('dashboard.index')->with('success', 'Article added successfully');
    }
    public function storeJournal(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'judul_artikel' => 'required|max:255',
            'penulis' => 'required|max:255',
            'nama_jurnal' => 'required|max:255',
            'volume_jurnal' => 'required|string',
            'nomor_jurnal' => 'required',
            'halaman'=>'required|string',
            'ISSN'=>'required|string',
            'penerbit'=>'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240'
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public', $fileName);

        // Create a new book instance
        $journal = new Journal();
        $journal->judul_artikel = $validatedData['judul_artikel'];
        $journal->penulis = $validatedData['penulis'];
        $journal->nama_jurnal = $validatedData['nama_jurnal'];
        $journal->volume_jurnal = $validatedData['volume_jurnal'];
        $journal->nomor_jurnal = $validatedData['nomor_jurnal'];
        $journal->halaman = $validatedData['halaman'];
        $journal->ISSN = $validatedData['ISSN'];
        $journal->penerbit = $validatedData['penerbit'];
        $journal->file_path = $fileName;  // Save the file path
        $journal->user_id = Auth::user()->id;

        // Save the book to the database
        $journal->save();

        // You can add a success message or redirection here
        return redirect()->route('dashboard.index')->with('success', 'Journal added successfully');
    }
    public function deleteBook($id)
    {
        // Cari buku berdasarkan ID
        $book = Book::find($id);

        // Hapus buku jika ditemukan
        if ($book) {
            $book->delete();
            return redirect()->route('dashboard.index')->with('success', 'Book deleted successfully');
        }

        // Redirect jika buku tidak ditemukan
        return redirect()->route('dashboard.index')->with('error', 'Book not found');
    }
    public function deleteArticle($id)
    {
        // Cari buku berdasarkan ID
        $article = Article::find($id);

        // Hapus buku jika ditemukan
        if ($article) {
            $article->delete();
            return redirect()->route('dashboard.index')->with('success', 'Article deleted successfully');
        }

        // Redirect jika buku tidak ditemukan
        return redirect()->route('dashboard.index')->with('error', 'Book not found');
    }
    public function deleteJournal($id)
    {
        // Cari buku berdasarkan ID
        $journal = Journal::find($id);

        // Hapus buku jika ditemukan
        if ($journal) {
            $journal->delete();
            return redirect()->route('dashboard.index')->with('success', 'Journal deleted successfully');
        }

        // Redirect jika buku tidak ditemukan
        return redirect()->route('dashboard.index')->with('error', 'Book not found');
    }
    public function editBook($id)
    {
        $book = Book::find($id);
        return view('dashboard.editbook', compact('book'));
    }

    public function editArticle($id)
    {
        $article = Article::find($id);
        return view('dashboard.editarticle', compact('article'));
    }

    public function editJournal($id)
    {
        $journal = Journal::find($id);
        return view('dashboard.editjournal', compact('journal'));
    }
    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        $book->judul_buku = $request->input('judul');
        $book->ISBN = $request->input('isbn');
        $book->penerbit = $request->input('penerbit');
        $book->jumlah_halaman = $request->input('jumlah_halaman');
        $book->save();

        return redirect()->route('dashboard.index')->with('success', 'Buku berhasil diperbarui!');
    }
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        $article->judul_artikel = $request->input('judul_artikel');
        $article->penulis = $request->input('penulis');
        $article->seminar_konferensi_simposium = $request->input('seminar_konferensi_simposium');
        $article->penyelenggara_seminar_konferensi_simposium = $request->input('penyelenggara_seminar_konferensi_simposium');
        $article->waktu_pelaksanaan_seminar_konferensi_simposium = $request->input('waktu_pelaksanaan_seminar_konferensi_simposium');
        $article->ISBN_ISSN = $request->input('ISBN_ISSN');
        $article->save();

        return redirect()->route('dashboard.index')->with('success', 'Buku berhasil diperbarui!');
    }
    public function updateJournal(Request $request, $id)
    {
        $article = Journal::find($id);
        $article->judul_artikel = $request->input('judul_artikel');
        $article->penulis = $request->input('penulis');
        $article->nama_jurnal = $request->input('nama_jurnal');
        $article->volume_jurnal = $request->input('volume_jurnal');
        $article->nomor_jurnal = $request->input('nomor_jurnal');
        $article->halaman = $request->input('halaman');
        $article->ISSN = $request->input('ISSN');
        $article->penerbit = $request->input('penerbit');
        $article->save();

        return redirect()->route('dashboard.index')->with('success', 'Buku berhasil diperbarui!');
    }
}
