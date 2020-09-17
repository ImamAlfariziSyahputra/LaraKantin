<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Barang;
use App\Kategori;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('admin/barang/index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin/barang/tambah', compact('kategoris'));
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
            'nama_barang' => 'required|min:2|max:60',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required',
            'id_kategori' => 'required',
        ]);
        
        if($request->file('gambar')) {
            // $gambar = $request->file('gambar')->store('uploads', 'public'); // acak nama gambar
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('uploads/', $gambar);
        }

        
        // Barang::create($request->all());
        Barang::insert([
            'nama_barang' => $request->get('nama_barang'),
            'gambar' => $gambar,
            'harga' => $request->get('harga'),
            'stok' => $request->get('stok'),
            'keterangan' => $request->get('keterangan'),
            'id_kategori' => $request->get('id_kategori')
        ]);

        alert()->success('Data Berhasil Ditambah', 'Optional Title');
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|min:2|max:60',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        Barang::where('id', $barang->id)
            ->update([
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'keterangan' => $request->keterangan
            ]);

        if ($request->hasFile('gambar')) {
            $image_path = "/uploads/" . $barang->gambar;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $request->file('gambar')->move('uploads/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }

        alert()->success('Data Berhasil Diubah', 'Optional Title');
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);

        alert()->success('Data Berhasil Dihapus', 'Optional Title');
        return redirect('/barang');
    }
}
