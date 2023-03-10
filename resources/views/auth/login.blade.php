@extends('layouts.app')

@section('login')
@if (Route::has('register'))
<li class="nav-item">
    <a class="btn btn-outline-light" href="{{ route('register') }}">{{ __('Daftar') }}</a>
</li>
@endif
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-8">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn bg-aero text-white">
                                        {{ __('Masuk') }}
                                    </button>
                                    <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif -->
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="mt-4 fw-bold">OR</p>
                            <a href="{{ route('login.google') }}" class="bg-primary py-3 px-5 w-100">
                                <img src="{{ asset('img/icons8-google-48.png') }}" alt="" class="img-fluid bg-white" style="width: 46px; margin-left: -47px; margin-bottom: 3px;">
                                <span class="text-white ms-5 fw-bold">Sign In With Google</span>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection