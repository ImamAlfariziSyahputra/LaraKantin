@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-4">Tambah Data Kategori</a> --}}
    <h2>Invoice</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->user_id }}</td>
                        <td>{{ $pesanan->tanggal }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>{{ $pesanan->kode }}</td>
                        <td>
                            Rp. {{ number_format($pesanan->jumlah_harga,0,',','.') }}
                        </td>
                        <td>
                            {{-- <a href="invoice/{{ $pesanan->id }}/edit" class="btn btn-success">Edit</a> --}}
                            
                            <form action="invoice/{{ $pesanan->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mr-2" onclick="return confirm('yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            
                            <a href="invoice/{{ $pesanan->id }}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Detail Pesanan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection