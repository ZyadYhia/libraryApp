@extends('layout')
@section('title')
    All Books
@endsection
@section('main')
<h1 class="text-success my-3 py-3">All Books</h1>
{{-- <a href="{{ url('/books/create') }}">Add new Books</a> 
<form action="{{ url('/books/search') }}" method="get" class="w-50 m-auto">
    <div class="form-group">
        <label for="search">Name: </label>
        <input class="form-control" type="text" name="search" id="search">
        <br>
        </div>
        <input class="form-control" type="submit">
    </form> --}}
    @foreach($books as $book)
        <h2>
            <a href="{{ url("/books/show/$book->id") }}">
                {{$book->id}} - {{$book->name}}
            </a>
            <!-- <a href="{{ url('/books/show',$book->id) }}">
                {{$book->id}} - {{$book->name}}
            </a> -->
        </h2>
    <div>
        <a href="{{ url("/books/edit/$book->id") }}">Edit</a>
        <a href="{{ url("/books/delete/$book->id") }}">Delete</a>
    </div>
    <img src="{{ asset("uploads/$book->img") }}" height="150px">
    <p>{{$book->price}}</p>
    <p>{{$book->desc}}</p>
    <hr>
    {{$books->links()}}
    @endforeach
@endsection
