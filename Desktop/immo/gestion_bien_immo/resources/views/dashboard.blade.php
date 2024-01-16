<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        {{-- local boostrap --}}
        <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }} ">
    <title>@yield('title') | Administration </title>
</head>

<body>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle"
            class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler"
            type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02"
            aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            @include('layouts.navigation')
    </nav>
    @php
        $route = request()
            ->route()
            ->getName();
    @endphp
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="#"> Start Bootstrap </a> </li>
                <li> <a class="nav-link" href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Gérer
                        les bien</a></li>
                <li> <a class="nav-link" href="{{ route('admin.option.index') }}" @class(['nav-link', 'active' => str_contains($route, 'option.')])>Gérer les
                        options</a> </li>
                <li> <a href="#">Gestion des options</a> </li>
                <li> <a href="#">Gestion des chambres</a> </li>
                <li> <a href="#">Gestion des salons </a> </li>
                {{-- <li> <a href="#">About</a> </li> --}}
                {{-- <li> <a href="#">Services</a> </li> --}}
                {{-- <li> <a href="#">Contact</a> </li> --}}
            </ul>
        </div> <!-- /#sidebar-wrapper -->
        <!-- Page Content -->

        <div id="page-content-wrapper">

            <div class="container mt-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="my-0">
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container-fluid">
                    @yield('content')
                </div>

            </div> <!-- /#page-content-wrapper -->
        </div> <!-- /#wrapper -->
        <!-- Bootstrap core JavaScript -->
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
        <script>
            $(function() {
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });

                $(window).resize(function(e) {
                    if ($(window).width() <= 768) {
                        $("#wrapper").removeClass("toggled");
                    } else {
                        $("#wrapper").addClass("toggled");
                    }
                });
            });
        </script>
        <style>

        </style>

</html>
</body>

</html>
