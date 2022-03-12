<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_rek', 'no_rek', 'total_buku', 'bank', 'total_harga'];
    public $timetamps = true;

    public function buku()
    {
        return $this->belongsTo('App\Models\buku', 'id_buku');
    }
    public function laporanpenjualan()
    {
        $this->hasMany('App\Models\penjualan', 'id_transaksi');
    }
}
