<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function create()
    {
        $cats = Cat::select('id', 'name')->get();

        return view('books.create', [
            'cats' => $cats
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'img'  => 'required|image|max:1024|mimes:jpg,jpeg,png',
            'price' => 'required|numeric|max:9999.99',
            'cat_id' => 'required|exists:cats,id',
        ]);

        // use Illuminate\Support\Facades\Storage;
        $imgPath = Storage::putFile("books", $request->img);

        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img'  => $imgPath,
            'price' => $request->price,
            'cat_id' => $request->cat_id,
        ]);

        return redirect(url('/books'));
    }
}
