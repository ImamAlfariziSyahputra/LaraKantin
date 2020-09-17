        <?php $no = 1 ?>
        @foreach ($pesanan_details as $pesanan_detail)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100">
            </td>
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