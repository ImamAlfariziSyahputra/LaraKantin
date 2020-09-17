<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Kategori;

class KategoriController extends Controller
{
    public function snack()
    {
        $barangs = Barang::where('id_kategori', '1')->get();
        return view('kategori.snack', compact('barangs'));
    }

    public function minuman()
    {
        $barangs = Barang::where('id_kategori', '2')->get();

        return view('kategori.minuman', compact('barangs'));
    }

    public function wafer()
    {
        $barangs = Barang::where('id_kategori', '3')->get();

        return view('kategori.wafer', compact('barangs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin/kategori/index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin/kategori/tambah', compact('kategoris'));
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

        Kategori::create($request->all());

        alert()->success('Data Berhasil Ditambah', 'Optional Title');
        return redirect('/kategori');
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
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::where('id', $kategori->id)
            ->update([
                'nama_kategori' => $request->nama_kategori
            ]);

        alert()->success('Data Berhasil Diubah', 'Optional Title');
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        alert()->success('Data Berhasil Dihapus', 'Optional Title');
        return redirect('/kategori');
    }
}
