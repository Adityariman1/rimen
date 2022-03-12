<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\buku;
use App\Models\laporanpenjualan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class LaporanpenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $laporanpenjualan = laporanpenjualan::with('buku', 'penjualan')->get();
        return view('laporanpenjualan.index', compact('laporanpenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = buku::all();
        $penjualan = penjualan::all();
        return view('laporanpenjualan.create', compact('buku', 'penjualan'));
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

            'id_buku' => 'required',
            'id_transaksi' => 'required',
        ]);

        $laporanpenjualan = new laporanpenjualan;
        $laporanpenjualan->id_buku = $request->id_buku;
        $laporanpenjualan->id_transaksi = $request->id_transaksi;

        $laporanpenjualan->save();
        return redirect()->route('laporanpenjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporanpenjualan  $laporanpenjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::findOrFail($id);
        $penjualan = penjualan::all();
        return view('buku.show', compact('buku', 'penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporanpenjualan  $laporanpenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        $penjualan = penjualan::all();
        return view('buku.show', compact('buku', 'penjualan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporanpenjualan  $laporanpenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([

            'id_buku' => 'required',
            'id_transaksi' => 'required',
        ]);

        $laporanpenjualan = laporanpenjualan::findOrFail($id);
        $laporanpenjualan->id_buku = $request->id_buku;
        $laporanpenjualan->id_transaksi = $request->id_transaksi;

        $laporanpenjualan->save();
        return redirect()->route('laporanpenjualan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporanpenjualan  $laporanpenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!laporanpenjualan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('laporanpenjualan.index');

    }
}
