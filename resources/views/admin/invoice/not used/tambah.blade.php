@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Form Tambah Data Barang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ url('kategori') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori">
                                    @error('nama_kategori')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection