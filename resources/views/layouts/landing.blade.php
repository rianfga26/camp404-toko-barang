<!DOCTYPE html>
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

<body class="bg-white">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md">
                <!-- step 1 -->
                <img src="{{ asset('img/aero-thum.png') }}" alt="" class="img-fluid w-100 h-25">
                <!-- step 2 -->
                <div class="d-flex mt-2 bg-light px-2 shadow rounded border">
                    <div class="d-flex w-50 justify-content-center align-items-center">
                        <img src="{{ asset('img/aero-logo.png') }}" alt="" class="img-fluid me-4 h-75">
                        <div class="">
                            <h4 class="mb-3 fw-bolder">AEROSTREET OFFICIAL STORE</h4>
                            <img src="{{ asset('img/pengikut.png') }}" alt="" class="img-fluid mb-3">
                            <a href="{{ route('login') }}" class="btn bg-aero text-white px-4 me-3">Masuk</a>
                            <a href="{{ route('register') }}" class="btn btn-light border border-1 px-4 text-aero">Daftar</a>
                        </div>
                    </div>
                    <div class="border border-1 mx-5"></div>
                    <div class="text-center w-50 mt-3">
                        <h5 class="fw-bold mb-3">Tentang Kami</h5>
                        <p>Brand sepatu Aerostreet merupakan brand lokal, kini Aerostreet telah menjadi pilihan fashion anak muda di Indonesia. Bahkan kini Aerostreet tak lagi diminati oleh masyarakat Indonesia saja, melainkan juga sudah bisa dirasakan oleh banyak orang yang berada di luar negeri.</p>
                    </div>
                </div>
                <!-- step 3 -->
                <div class="d-flex justify-content-between align-items-center mt-4 shadow rounded border py-4 container bg-light">
                    <div class="container ps-5">
                        <a href="{{ route('guest') }}" class="text-decoration-none text-uppercase {{ Route::currentRouteName() == 'guest' ? 'text-aero' : '' }} text-secondary me-5 fw-bold">Home</a>
                        <a href="{{ route('product.index') }}" class="text-decoration-none text-uppercase {{ Route::currentRouteName() == 'product.index' ? 'text-aero' : '' }} text-secondary me-5 fw-bold">semua produk</a>
                    </div>
                    
                    <form action="{{ route('product.index') }}" class="w-50">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control w-75" placeholder="Temukan produk..." style="background: #D9D9D9" name="search" autocomplete="off">
                            <button type="submit" class="btn bg-aero text-white ms-1">Cari</button>
                        </div>
                    </form>
                    
                </div>
                <!-- step 4 -->
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>