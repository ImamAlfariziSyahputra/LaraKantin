@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-4">Tambah Data Kategori</a> --}}
    <h2>Detail Invoice</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan_details as $pesanan_detail)
                    <tr>
                        <td>{{ $pesanan_detail->pesanan_id}}</td>
                        <td>{{ $pesanan_detail->barang_id}}</td>
                        <td>{{ $pesanan_detail->jumlah }} item</td>
                        <td>
                            Rp. {{ number_format($pesanan_detail->jumlah_harga,0,',','.') }}
                        </td>
                        <td>
                            <a href="/invoice" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection