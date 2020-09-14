<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $barangs = Barang::paginate(10);
        return view('home', compact('barangs'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
