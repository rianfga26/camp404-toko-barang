@extends('layouts.app')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-aero fs-5 text-white fw-bold">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang, <b>{{ Auth::user()->name }}</b> pada tampilan administrator toko !
                </div>
            </div>
        </div>
@endsection
