<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Recording</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
    {{-- FONT STYLE --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto+Slab&display=swap" rel="stylesheet">

    {{-- CSS STYLE --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    {{-- CSS and Scripts STYLE PER-PAGE --}}
    @yield('CSS')

</head>
<body>

    <div class="container-fluid con-style">
        <nav class="navbar nav-top nav-border">
            <div class="container-fluid">
                <a href="" class="navbar-brand tittle">
                    {{ $tittle }}
                </a>
                @yield('search')
            </div>
        </nav>

        <div class="container-fluid mt-4 mb-5">
            @yield('layouts')
        </div>

    </div>

    <nav class="main-menu">
        <ul>
            <li>
                <a href="#" class="banner">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                    <span class="nav-textban">
                        Peternakan Gunungkelir Cipta Mandiri
                    </span>
                </a>
            </li>
            <li>
                <a href="/notif" class="a-menu">
                    <i class="fa fa-bell-o"></i>
                    <span class="nav-text">Notification</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        12
                    </span>
                </a>
            </li>
            <li>
                <a href="/breeding/input" class="a-menu">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="nav-text">
                        Input Data
                    </span>
                </a>
            </li>
            <li>
                <a href="/breeding/list" class="a-menu">
                    <i class="fa fa-list-alt"></i>
                    <span class="nav-text">
                        View Data
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="/logout" class="a-menu">
                    <i class="fa fa-sign-out"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    
</body>
</html>