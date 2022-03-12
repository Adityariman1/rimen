<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanpenjualan extends Model
{
    use HasFactory;

    public function buku()
    {

        return $this->belongsTo('App\Models\buku', 'id_buku');
    }
    public function penjualan()
    {

        return $this->belongsTo('App\Models\penjualan', 'id_transaksi');
    }
}
