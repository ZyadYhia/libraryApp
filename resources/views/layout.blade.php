<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('page-style')
</head>

<body>
    @yield('main')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('page-script')
</body>

</html>