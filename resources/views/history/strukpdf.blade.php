<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table1 {
            margin-left: 135px;
            margin-bottom: 10px;
        }
        .table1 th {
            text-align: left;
        }
        .table2, h1 {
            font-family: sans-serif;
            text-align: center;
            margin: auto;
        }
    </style>
</head>
<body>
    @if (!empty($pesanan))
    <h1>STRUK PEMBAYARAN</h1> <br><br><br>
    <table class="table1">
        <tr>
            <th>Nama</th>
            <td>:</td>
            <td>{{ auth()->user()->name }}</td>
        </tr>
        <tr>
            <th>Tanggal Pesan</th>
            <td>:</td>
            <td>{{ $pesanan->tanggal }}</td>
        </tr>
    </table>

    <table class="table2" border="1" cellspacing="0" cellpadding="10" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($pesanan_details as $pesanan_detail)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                <td>{{ $pesanan_detail->jumlah }}</td>
                <td align="right">
                    Rp. {{ number_format($pesanan_detail->barang->harga,0,',','.') }}
                </td>
                <td align="right">
                    Rp. {{ number_format($pesanan_detail->jumlah_harga,0,',','.') }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right">
                    <strong>Total Harga :</strong>
                </td>
                <td align="right">
                    <strong>Rp. {{ number_format($pesanan->jumlah_harga,0,',','.') }} </strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right">
                    <strong>Kode Unik :</strong>
                </td>
                <td align="right">
                    <strong>Rp. {{ $pesanan->kode }} </strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right">
                    <strong>Total Yang Harus Dibayar :</strong>
                </td>
                <td align="right">
                    <strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga,0,',','.') }} </strong>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
</body>
</html>

    
