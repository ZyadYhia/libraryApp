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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @guest            
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/login')}}">Login</a>
          </li>
        @endguest
        @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/logout')}}">Logout</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

    <div class="p-4">
        @yield('main')
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        @yield('page-script')
    </div>
</body>

</html>