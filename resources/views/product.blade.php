@extends('layouts.landing')

@section('content')
<div class="row mt-4">
    <h5>Result : {{ $products->total() }}</h5>
    @foreach($products as $product)
    <div class="col-md-3 mb-3">
        <div class="card shadow px-3 bg-light">
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

    <div class="d-flex justify-content-end mt-5">
        {!! $products->links() !!}
    </div>
</div>
@endsection