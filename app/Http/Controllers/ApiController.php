<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $kategori = kategori::all();

        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data Kategori',
            'data' => $kategori
        ], 200);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $validated = $request->validate([
            'keterangan' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = new kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
         //ubah ke json
         return response()->json([
            'succes' => true,
            'message' => 'List Data Kategori',
            'data' => $kategori
        ], 200);
    }

    public function show($id){
        $kategori = kategori::find($id);

        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data Kategori',
            'data' => $kategori
        ], 200);
    }

    public function edit($id){
         //
    }

    public function update(Request $request, $id){

        $kategori = kategori::findOrFail($id);
        $kategori->keterangan = $request->keterangan;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        
        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data Kategori',
            'data' => $kategori
        ], 200);

    }
}
