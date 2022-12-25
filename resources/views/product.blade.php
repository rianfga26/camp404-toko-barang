@extends('layouts.landing')

@section('konten')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 text-center">
        <h1>Product / Catalog Barang</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident ipsam ad sapiente placeat distinctio impedit a natus sint minima vitae, repudiandae dignissimos, praesentium ab.</p>
    </div>
    <div class="col-md-10 mt-3 mb-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mt-4">
                    <div class="card shadow">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=799&q=80" alt="" class="img-fluid img-thumbnail">

                        <div class="card-body">
                            <h5 class="fw-bold">{{ $product->nama }}</h5>
                            <div class="d-flex justify-content-between mt-4 mb-n2">
                                <p class="fw-bold text-success">Rp. {{ number_format($product->harga) }}</p>
                                <p>tersedia: {{ $product->jumlah }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
