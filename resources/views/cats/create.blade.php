@extends('layout')
@section('title')
    Create Cat
@endsection
@section('main')
    <h1 class="text-success my-3 py-3">Create Category</h1>
    @include('errors')
    <form class="w-75 m-auto" action="{{ url('/cats/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name">
        <br>
        </div>
        <div class="form-group">
        <label for="desc">Desc: </label>
        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div class="form-group">
        <label for="img">Image: </label>
        <input class="form-control" type="file" name="img" id="img">
        </div>
        <br>
        <input class="form-control btn btn-dark" type="submit" value="Add">
    </form>
@endsection