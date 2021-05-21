@extends('layout')
@section('title')
    Create Cat
@endsection
@section('main')
    <h1>Create Categoryy</h1>
    @include('errors')
    <form action="{{ url('/cats/store') }}" method="POST">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="desc">Desc: </label>
        <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Add">
    </form>
@endsection