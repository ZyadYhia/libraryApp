@extends('layout')
@section('title')
    {{$cat->name}} Category
@endsection
@section('main')
    <h1>{{$cat->name}} Categories</h1>
    <h2>{{$cat->id}} - {{$cat->name}}</h2>
    <p>{{$cat->desc}}</p>
    <small>Created at {{$cat->created_at}}</small>
    <a href="{{url('/cats')}}">Back</a>
@endsection