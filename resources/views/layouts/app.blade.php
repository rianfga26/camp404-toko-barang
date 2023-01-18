<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<!-- Custom Styles -->
<style>
.bg-aero {
    background: #195D84 !important;
}

.text-aero {
    color: #195D84 !important;
}
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-aero shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid w-50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @yield('login')
                        @yield('register')
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @guest
            @yield('content')
            @else
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header fw-bold text-center fs-5 text-white bg-aero">Aero Street</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item fw-bold" aria-current="true">
                                        <a href="{{ route('home') }}"
                                            class="text-decoration-none {{ Route::currentRouteName() == 'home' ? 'text-aero' : 'text-dark'}}">Dashboard</a>
                                    </li>
                                    <li class="list-group-item fw-bold">
                                        <a href="{{ route('product.create') }}"
                                            class="text-decoration-none {{ Route::currentRouteName() == 'product.create' ? 'text-aero' : 'text-dark'}}">Manage
                                            Store</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
            @endguest
        </main>
    </div>

    
</body>

</html>