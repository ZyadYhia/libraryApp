<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>
    <h1>All Categories</h1>
    <a href="{{ url('/cats/create') }}">Add new category</a>
    @foreach($cats as $cat)
    <h2>
        <a href="{{ url("/cats/show/$cat->id") }}">
            {{$cat->id}} - {{$cat->name}}
        </a>
        <!-- <a href="{{ url('/cats/show',$cat->id) }}">
            {{$cat->id}} - {{$cat->name}}
        </a> -->
    </h2>
    <a href="{{ url("/cats/edit/$cat->id") }}">Edit</a>
    <a href="{{ url("/cats/delete/$cat->id") }}">Delete</a>
    <p>{{$cat->desc}}</p>
    <hr>
    @endforeach
</body>

</html>