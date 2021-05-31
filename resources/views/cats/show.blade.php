@extends('layout')
@section('title')
    {{$cat->name}} Category
@endsection
@section('main')
    <h1 class="text-success my-3 py-3">{{$cat->name}} Categories</h1>
    <h2>{{$cat->id}} - {{$cat->name}}</h2>
    <img src="{{ asset("uploads/$cat->img") }}" height="400px">
    <p>{{$cat->desc}}</p>
    <small>Created at {{$cat->created_at}}</small>
    <h5>Books:</h5>
    <ul>
        @foreach ($cat->books as $book)
            <li><a href="{{ url("books/show/$book->id'")}}"> {{$book->name}}</a></li>
        @endforeach
    </ul>
    <a href="{{url('/cats')}}">Back</a>
@endsection