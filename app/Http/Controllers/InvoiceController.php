<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PesananDetail;
use App\Barang;
use App\Pesanan;

class InvoiceController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('admin.invoice.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanans = Pesanan::all();
        return view('admin.invoice.tambah', compact('pesanans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        PesananDetail::create($request->all());

        alert()->success('Data Berhasil Ditambah', 'Optional Title');
        return redirect('/invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('admin.invoice.detail', compact('pesanan_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PesananDetail $pesanan_detail)
    {
        return view('admin.invoice.edit', compact('pesanan_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesananDetail $pesanan_detail)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        PesananDetail::where('id', $pesanan_detail->id)
            ->update([
                'nama_kategori' => $request->nama_kategori
            ]);

        alert()->success('Data Berhasil Diubah', 'Optional Title');
        return redirect('/invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        // dd($pesanan);
        // Hapus Data Pesanan dan Detail Pesanan Sesuai ID
        Pesanan::destroy($pesanan->id);
        PesananDetail::where('pesanan_id', $pesanan->id)->delete();

        alert()->success('Data Berhasil Dihapus', 'Optional Title');
        return redirect('/invoice');
    }
}
