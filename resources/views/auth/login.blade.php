@extends('layout')

@section('title')
    Login
@endsection

@section('main')
    <h1>Login</h1>

    @include('errors')

    @if (request()->session()->has('msg'))
        <div class="alert alert-danger">
            {{request()->session()->get('msg')}}
        </div>        
    @endif

    <form class="w-75 m-auto" action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="name">E-Mail: </label>
        <input class="form-control" type="email" name="email" placeholder="E-Mail">
        <br>
        </div>
        <div class="form-group">
        <label for="name">Password: </label>
        <input class="form-control" type="password" name="password" placeholder="Password">
        <br>
        </div>
        <br>
        <input class="form-control btn btn-dark" type="submit" value="LOGIN">
    </form>
@endsection