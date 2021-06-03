@extends('layout')
@section('title')
    All Categories
@endsection
@section('main')
    @if (request()->session()->has('msg'))
        <div class="alert alert-success">
           <p>{{request()->session()->get('msg')}}</p>
        </div>        
    @endif  
    <h1 class="text-success my-3 py-3">All Categories</h1>
    @auth
        <a href="{{ url('/cats/create') }}">Add new category</a>
        <form action="{{ url('/cats/search') }}" method="get" class="w-50 m-auto">
            <div class="form-group">
                <label for="search">Name: </label>
                <input class="form-control" type="text" name="search" id="search">
                <br>
            </div>
            <input class="form-control" type="submit">
        </form>
    @endauth
    @foreach($cats as $cat)
        <h2>
            <a href="{{ url("/cats/show/$cat->id") }}">
                {{$cat->id}} - {{$cat->name}}
            </a>
            <!-- <a href="{{ url('/cats/show',$cat->id) }}">
                {{$cat->id}} - {{$cat->name}}
            </a> -->
        </h2>
    <div>
        <a href="{{ url("/cats/edit/$cat->id") }}">Edit</a>
        <a href="{{ url("/cats/delete/$cat->id") }}">Delete</a>
    </div>
    <img src="{{ asset("uploads/$cat->img") }}" height="150px">
    <p>{{$cat->desc}}</p>
    <hr>
    {{$cats->links()}}
    @endforeach
@endsection
