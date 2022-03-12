<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori','judul_buku','harga','cover','keterangan','pengarang_buku','stok','tahun_terbit'];
    public $timetamps = true;

    public function kategori()
    {

        return $this->belongsTo('App\Models\kategori', 'id_kategori');
    }
    public function penjualan()
    {
        $this->hasMany('App\Models\buku', 'id_buku');
    }
    public function laporanpenjualan()
    {
        $this->hasMany('App\Models\buku', 'id_buku');
    }

    

    public function image()
    {
        if ($this->cover && file_exists(public_path('image/buku/' . $this->cover))) {
            return asset('image/buku/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/buku/' . $this->cover))) {
            return unlink(public_path('image/buku/' . $this->cover));
        }

    }
}
