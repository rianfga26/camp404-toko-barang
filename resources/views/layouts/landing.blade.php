<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Barang</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('guest') }}">Toko Barang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'product.index' ? 'active' : ''}} " href="{{ route('product.index') }}">Product</a>
                        <div class="{{ Route::currentRouteName() == 'product.index' ? 'border-bottom border-dark border-3 mt-n2 w-75 mx-auto' : ''}}"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : ''}}" href="{{ route('about') }}">About</a>
                        <div class="{{ Route::currentRouteName() == 'about' ? 'border-bottom border-dark border-3 mt-n2 w-75 mx-auto' : ''}}"></div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('konten')
    </div>
</body>

</html>