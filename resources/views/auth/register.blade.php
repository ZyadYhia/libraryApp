@extends('layout')

@section('title')
    Register
@endsection

@section('main')
    <h1>Register</h1>

    @include('errors')

    <form class="w-75 m-auto" action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" placeholder="Name">
        <br>
        </div>
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
        <div class="form-group">
        <label for="name">Confirm Password: </label>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Re-Password">
        <br>
        </div>
        <br>
        <input class="form-control btn btn-dark" type="submit" value="REGISTER">
    </form>
@endsection