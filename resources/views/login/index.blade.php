<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    {{-- CSS STYLE --}}
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <nav class="navbar head">
        <div class="d-flex navbar-brand m-1">
            <img src="images/logo.png" alt="Logo" width="59" class="d-inline-block align-text-top ms-3 me-3">
            <div class="lh-1">
                <h1 class="h6 mb-0 lh-1 header-text">Peternakan Gunungkelir Cipta Mandiri</h1>
                <small class="address">Katerban 07/01, Desa Donorejo, Kaligesing, Purworejo</small>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center mt-5">
        <form method="POST" action="{{ route('login') }}" class="form-floating m-3 p-4 rounded w-50" style="background-color: white">
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h1 class="h3 mb-5 fw-normal text-center" style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', cursive">Please Login</h1>
        
            @csrf
            <div class="form-floating mb-2">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required autofocus value="{{ old('username') }}">
                <label for="username">Username</label>
              
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>
