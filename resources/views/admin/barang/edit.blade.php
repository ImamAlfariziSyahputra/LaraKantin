@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Form Edit Data Barang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="/barang/{{ $barang->id }}" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control @error('noppdb') is-invalid @enderror" value="{{ $barang->nama_barang }}" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
                                    @error('nama_barang')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="gambar" class="">Gambar</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" @error('noppdb') is-invalid @enderror" value="{{ $barang->harga }}" name="harga" id="harga" placeholder="Harga">
                                    @error('harga')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control @error('noppdb') is-invalid @enderror" value="{{ $barang->stok }}" name="stok" id="stok" placeholder="Stok">
                                    @error('stok')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control @error('noppdb') is-invalid @enderror" value="{{ $barang->keterangan }}" name="keterangan" id="keterangan" placeholder="Keterangan">
                                    @error('keterangan')
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