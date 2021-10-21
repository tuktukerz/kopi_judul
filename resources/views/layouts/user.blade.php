<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/public/fr/css/bootstrap.min.css') }}">

    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('/public/fr/css/cd.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/fr/css/my.css') }}">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    @stack('top')
    <title>@yield('title')</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index')}}">
                <img src="{{ asset('/public/fr/img/logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Kopi Judul
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('index')}}">Home </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('allmenu')}}">Order<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('carts.index') }}">Cart ({{ $jmlh_carts ?? ' ' }})</a>
                </li>
            </ul>

            </div>
        </div>
    </nav>

        <div class="container min-vh-100">
            @yield('content')
        </div>

    <!-- Footer -->
    <footer class="mt-5">
        <p class="mt-3">&copy; Kopi Judul 2021 <br>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="{{ asset('/public/fr/js/jquery-3.5.1.slim.min.js') }}" ></script>
    <script src="{{ asset('/public/fr/js/bootstrap.bundle.min.js') }}" ></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- ION ICON -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    @stack('bottom')
  </body>
</html>
