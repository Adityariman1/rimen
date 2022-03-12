<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\buku;
use App\Models\penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = penjualan::with('buku')->get();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = buku::all();
        return view('penjualan.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama_rek' => 'required',
        //     'id_buku' => 'required',
        //     'no_rek' => 'required',
        //     'total_buku' => 'required',
        //     'bank' => 'required',
        //     'total_harga' => 'required',
        // ]);

        $penjualan = new penjualan;
        $penjualan->nama_rek = $request->nama_rek;
        $penjualan->id_buku = $request->id_buku;
        $penjualan->no_rek = $request->no_rek;
        $penjualan->total_buku = $request->total_buku;
        $penjualan->bank = $request->bank;
        $penjualan->total_harga = $penjualan->buku->harga * $penjualan->total_buku;

        buku::findOrFail($request->id_buku);
        $penjualan->buku->stok -= $penjualan->total_buku;
        $penjualan->buku->save();

        $penjualan->save();
        return redirect()->route('penjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan = penjualan::findOrFail($id);
        $buku = buku::all();
        return view('penjualan.show', compact('penjualan', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualan = penjualan::findOrFail($id);
        $buku = buku::all();
        return view('penjualan.edit', compact('penjualan', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'nama_rek' => 'required',
        //     'id_buku' => 'required',
        //     'no_rek' => 'required',
        //     'total_buku' => 'required',
        //     'bank' => 'required',
        //     'total_harga' => 'required',
        // ]);

        $penjualan = penjualan::findOrFail($id);
        $penjualan->nama_rek = $request->nama_rek;
        $penjualan->id_buku = $request->id_buku;
        $penjualan->no_rek = $request->no_rek;
        $penjualan->total_buku = $request->total_buku;
        $penjualan->bank = $request->bank;
        $penjualan->total_harga = $penjualan->buku->harga * $penjualan->total_buku;

        buku::findOrFail($request->id_buku);
        $penjualan->buku->stok -= $penjualan->total_buku;
        $penjualan->buku->save();
        $penjualan->save();
        return redirect()->route('penjualan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!penjualan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('penjualan.index');

    }
}
