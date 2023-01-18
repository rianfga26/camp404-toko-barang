@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-aero fs-5 text-white fw-bold">{{ __('Manajemen Barang') }}</div>

        <div class="card-body">
            <a href="javascript:void(0)" class="btn bg-aero text-white mb-2 btn-sm fw-bold" data-bs-toggle="modal"
                data-bs-target="#tambahModal">Tambah Produk</a>
            <table class="table">
                <thead class="table-light ">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->jumlah }}</td>
                        <td>{{ number_format($product->harga) }}</td>
                        <td class="d-flex justify-content-center gap-1">
                            <a href="javascript:void(0)" onclick="getProduct('{{ $product->id }}')"
                                data-bs-toggle="modal" data-bs-target="#editModal"
                                class="btn btn-warning btn-sm fw-bold">Edit</a>
                            <button id="btnHapus" data-bs-toggle="modal" data-bs-target="#logoutModal"
                                class="btn btn-danger btn-sm fw-bold" product-id="{{ $product->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal section -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aero text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('product.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputnama1" class="form-label">Nama Barang <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputnama1"
                            placeholder="Masukkan nama barang anda..." name="nama" aria-describedby="namaHelp">
                        @error('nama')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputimage1" class="form-label">Gambar Barang <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputimage1"
                            placeholder="Masukkan image barang anda berupa link..." name="image" aria-describedby="imageHelp">
                        @error('image')
                        <div id="imageHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputjumlah1" class="form-label">Jumlah <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputjumlah1"
                            placeholder="Masukkan jumlah barang..." name="jumlah">
                        @error('jumlah')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputharga1" class="form-label">Harga <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputharga1"
                            placeholder="Masukkan harga barang..." name="harga">
                        @error('harga')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-aero text-white">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aero text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="formEdit">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputnama1" class="form-label">Nama Barang <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputnama2"
                            placeholder="Masukkan nama barang anda..." name="nama" aria-describedby="namaHelp">
                        @error('nama')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputimage2" class="form-label">Gambar Barang <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputimage2"
                            placeholder="Masukkan image barang anda berupa link..." name="image" aria-describedby="imageHelp">
                        @error('image')
                        <div id="imageHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputjumlah1" class="form-label">Jumlah <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputjumlah2"
                            placeholder="Masukkan jumlah barang..." name="jumlah">
                        @error('jumlah')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputharga1" class="form-label">Harga <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputharga2"
                            placeholder="Masukkan harga barang..." name="harga">
                        @error('harga')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-aero text-white">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="modal" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-aero text-white">
                <h5 class="modal-title">Hapus</h5>
            </div>
            <div class="modal-body">
                <p class="text-center fs-5">Apakah Anda Yakin Ingin Menghapus Produk Ini ? <br>

                    Jika YA klik tombol “OK”, jika TIDAK klik “Cancel”.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <form action="" id="formHapus" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-success">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var formHapus = document.getElementById('formHapus');
var btnHapus = document.getElementById('btnHapus');
formHapus.action = '/product/' + btnHapus.getAttribute('product-id');


function getProduct(id) {
    var form = document.getElementById('formEdit');
    var nama = document.getElementById('exampleInputnama2');
    var jumlah = document.getElementById('exampleInputjumlah2');
    var harga = document.getElementById('exampleInputharga2');
    var image = document.getElementById('exampleInputimage2');
    fetch('/product/' + id + '/edit')
        .then((response) => response.json())
        .then((data) => {
            form.action = '/product/' + data.id;
            nama.value = data.nama;
            image.value = data.image;
            jumlah.value = data.jumlah;
            harga.value = data.harga;
        });
}
</script>
@endsection