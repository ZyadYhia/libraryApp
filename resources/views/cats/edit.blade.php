<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Cat</title>
</head>

<body>
    <h1>Add Categoryy</h1>
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
</body>

</html>