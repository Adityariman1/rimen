<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penjualan;
use App\Models\pesan;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $buku = buku::where('id', $id)->first();

        return view('pesan.index', compact('buku'));
    }


}
