@extends('layout')
@section('title')
    Latest {{$num}} Categories
@endsection
@section('main')
    <h1 class="text-success my-3 py-3">Latest {{$num}} Categories</h1>
    <a href="{{url('/cats')}}">Back to all cats</a>
    @foreach ($cats as $cat)
        <h2>{{$cat->id}} - {{$cat->name}}</h2>
        <img src="{{ asset("uploads/$cat->img") }}" height="400px">
        <p>{{$cat->desc}}</p>
        <small>Created at {{$cat->created_at}}</small>
    @endforeach    
@endsection