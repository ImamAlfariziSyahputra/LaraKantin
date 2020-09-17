<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use App\User;

use Alert;
use Auth;
use PDF;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        // dump($pesanan);
        // dump($pesanan->id);
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        // dd($pesanan_details);

        return view('history.detail', compact('pesanan', 'pesanan_details'));
    }

    public function preview(Pesanan $data_pesanan)
    {
        // $ubah_pesanan = Pesanan::where('id', $data_pesanan->id)->where('user_id', Auth::user()->id)->first();
        // dump($ubah_pesanan);
        // Ubah status menjadi 2
        // if ($ubah_pesanan->status == '2') {
        //     alert()->error('Pesanan Sudah Dibayar', 'Error');
        //     return redirect('history/' . $ubah_pesanan->id);
        // } else if ($ubah_pesanan->status = '1'){
        //     $ubah_pesanan->status = 2;
        //     $ubah_pesanan->update();
        // }
        // ambil pesanan yang status nya 
        $pesanan = Pesanan::where('id', $data_pesanan->id)->where('user_id', Auth::user()->id)->where('status', 2)->first();
        // dump($pesanan);
        $pesanan_id = $pesanan->id;
        // dump($pesanan_id);

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        // dd($pesanan_details);

        // return view('history.strukpdf', compact('pesanan', 'pesanan_details'));

        $pdf = PDF::loadView('history.strukpdf', compact('pesanan','pesanan_details'));
        
        return $pdf->download('struk.pdf');
    }

    public function pdf()
    {
        // ambil pesanan yang status nya 
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
        // dump($pesanan);

        // $pesanan_id = $pesanan->id;
        // dump($pesanan_id);

        // $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        // dd($pesanan_details);

        // $pesanan_details = \App\PesananDetail::all();

        $pdf = PDF::loadView('history.strukpdf', compact('pesanans'));
        return $pdf->download('struk.pdf');
    }

    
}
