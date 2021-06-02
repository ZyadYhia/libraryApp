<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return BookResource::collection($books);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return response()->json([
                'status' => 'notFound'
            ], 404);
        }
        return new BookResource($book);
    }
}
