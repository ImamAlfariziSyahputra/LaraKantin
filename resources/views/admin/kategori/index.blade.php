@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-4">Tambah Data Kategori</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach ($kategoris as $kategori)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a href="kategori/{{ $kategori->id }}/edit" class="btn btn-success">Edit</a>

                            <form action="/kategori/{{ $kategori->id }}" method="POST" class="d-inline">
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