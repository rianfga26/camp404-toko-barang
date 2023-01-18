@extends('layouts.landing')

@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <a href="#">
            <img src="{{ asset('img/flash-sale.png') }}" alt="" class="img-fluid h-100 w-100">
        </a>
    </div>
    <div class="col-md-12">
        <a href="#">
            <img src="{{ asset('img/gebyar-diskon.png') }}" alt="" class="img-fluid h-100 w-100">
        </a>
    </div>
    <div class="col-md-12 mb-4">
        <a href="#">
            <img src="{{ asset('img/new-arrival.png') }}" alt="" class="img-fluid h-100 w-100">
        </a>
    </div>
    <div class="px-5 mb-5">
        <h3 class="fw-bolder fs-4 mb-4">Produk</h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card shadow px-3">
                    <div class="card-body">
                        <img src="{{ $product->image }}" alt="" class="img-fluid">
                        <h5 class="fw-bold">{{ $product->nama }}</h5>
                        <span>Rp. {{ number_format($product->harga) }},-</span>
                        <br>
                        <span>Stok : {{ $product->jumlah }}</sp>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection