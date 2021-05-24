@extends('layout')
@section('title')
    Edit Cat
@endsection
@section('main')
    <h1 class="text-success my-3 py-3">Edit Categoryy</h1>
    @include('errors')
    <form class="w-75 m-auto" action="{{ url("/cats/update/$cat->id") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" value="{{$cat->name}}" type="text" name="name" id="name">
        <br>
        </div>
        <div class="form-group">
        <label for="desc">Desc: </label>
        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10">{{$cat->desc}}</textarea>
        </div>
        <div class="form-group">
        <img src="{{ asset("uploads/$cat->img") }}" height="100px">
        <input class="form-control" type="file" name="img" id="img">
        </div>
        <br>
        <input class="form-control btn btn-dark" type="submit" value="Update">
    </form>
@endsection