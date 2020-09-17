@extends('layouts.user')

@section('content')

    <div class="row justify-content-center">
        {{-- <div class="col-md-12 mb-3">
            <img src="{{ url('images/kantin.png') }}" class="mx-auto d-block" width="300">
        </div> --}}
        @foreach ($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card">
                <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">
                            <strong>Harga :</strong> Rp. {{ number_format($barang->harga,0,',','.') }} <br>
                            <strong>Stok :</strong> {{ $barang->stok }} <br>
                            <hr>
                            <strong>Keterangan :</strong> <br>
                            {{ $barang->keterangan }}
                        </p>
                        <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pesan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection