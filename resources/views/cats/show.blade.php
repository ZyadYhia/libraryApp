<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$cat->name}} Category</title>
</head>

<body>
    <h1>All Categories</h1>
    <h2>{{$cat->id}} - {{$cat->name}}</h2>
    <p>{{$cat->desc}}</p>
    <small>Created at {{$cat->created_at}}</small>
    <a href="{{url('/cats')}}">Back</a>
</body>

</html>