@extends('layout')
@section('title')
    {{$book->name}} 
@endsection
@section('main')
    <h1 class="text-success my-3 py-3">{{$book->name}}</h1>
    <h2>{{$book->id}} - {{$book->name}}</h2>
    <a href="{{ url("cats/show/".$book->cat->id) }}"><h5>{{$book->cat->name}} Category</h5></a>
    <img src="{{ asset("uploads/$book->img") }}" height="400px">
    <p>{{$book->price}}</p>
    <p>{{$book->desc}}</p>
    <small>Created at {{$book->created_at}}</small>
    <a href="{{url('/books')}}">Back</a>
@endsection