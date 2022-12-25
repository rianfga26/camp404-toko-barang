@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('Manajemen Barang') }}</div>

        <div class="card-body">
            <a href="javascript:void(0)" class="btn btn-outline-primary mb-2 btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Barang</a>
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
                        <td>{{ $product->harga }}</td>
                        <td class="d-flex justify-content-center gap-1">
                            <a href="javascript:void(0)" onclick="getProduct('{{ $product->id }}')" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-warning btn-sm fw-bold">Edit</a>
                            <form action="{{ $product->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Apakah anda ingin menghapus barang ini?')" class="btn btn-danger btn-sm fw-bold">Hapus</button>
                            </form>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('product.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputnama1" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputnama1" placeholder="Masukkan nama barang anda..." name="nama" aria-describedby="namaHelp">
                        @error('nama')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputjumlah1" class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputjumlah1" placeholder="Masukkan jumlah barang..." name="jumlah">
                        @error('jumlah')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputharga1" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputharga1" placeholder="Masukkan harga barang..." name="harga">
                        @error('harga')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="formEdit">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputnama1" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputnama2" placeholder="Masukkan nama barang anda..." name="nama" aria-describedby="namaHelp">
                        @error('nama')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputjumlah1" class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputjumlah2" placeholder="Masukkan jumlah barang..." name="jumlah">
                        @error('jumlah')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputharga1" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleInputharga2" placeholder="Masukkan harga barang..." name="harga">
                        @error('harga')
                        <div id="namaHelp" class="form-text text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getProduct(id) {
        var form = document.getElementById('formEdit');
        var nama = document.getElementById('exampleInputnama2');
        var jumlah = document.getElementById('exampleInputjumlah2');
        var harga = document.getElementById('exampleInputharga2');
        fetch('/product/'+id+'/edit')
            .then((response) => response.json())
            .then((data) => {
                form.action = '/product/'+data.id;
                nama.value = data.nama;
                jumlah.value = data.jumlah;
                harga.value = data.harga;
            });
    }
</script>
@endsection