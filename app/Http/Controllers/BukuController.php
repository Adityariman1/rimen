<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;
use Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::with('kategori')->get();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('buku.create', compact('kategori'));
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

            'judul_buku' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',
            'keterangan' => 'required',
            'id_kategori' => 'required',
            'pengarang_buku' => 'required',
            'stok' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $buku = new buku;
        $buku->judul_buku = $request->judul_buku;
        $buku->harga = $request->harga;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/buku/', $name);
            $buku->cover = $name;
        }
        $buku->keterangan = $request->keterangan;
        $buku->id_kategori = $request->id_kategori;
        $buku->pengarang_buku = $request->pengarang_buku;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::findOrFail($id);
        $kategori = kategori::all();
        return view('buku.show', compact('buku', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        $kategori = kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul_buku' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',
            'keterangan' => 'required',
            'pengarang_buku' => 'required',
            'stok' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $buku = buku::findOrFail($id);
        $buku->id_kategori = $request->id_kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->harga = $request->harga;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/buku/', $name);
            $buku->cover = $name;
        }
        $buku->keterangan = $request->keterangan;
        $buku->pengarang_buku = $request->pengarang_buku;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data edited successfully",
        ]);
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!buku::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('buku.index');
    }

    public function bukunya()
    {

        $buku = buku::all();
        return view('frontend.index', compact('buku'));

    }
}
