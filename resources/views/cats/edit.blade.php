@extends('layout')
@section('title')
    Edit Cat
@endsection
@section('main')
    <h1>Edit Categoryy</h1>
    @include('errors')
    <form action="{{ url("/cats/update/$cat->id") }}" method="POST">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="{{$cat->name}}">
        <br>
        <label for="desc">Desc: </label>
        <textarea name="desc" id="desc" cols="30" rows="10">{{$cat->desc}}</textarea>
        <br>
        <input type="submit" value="Update">
    </form>
@endsection