@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ url('barang/create') }}" class="btn btn-primary mb-4">Tambah Data</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="bg-primary text-white">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach ($barangs as $barang)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->keterangan }}</td>
                        {{-- <td>{{ $barang->kategori }}</td> --}}
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ $barang->gambar }}</td>
                        <td>
                            <a href="barang/{{ $barang->id }}/edit" class="btn btn-success">Edit</a>

                            <form action="/barang/{{ $barang->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('yakin?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection