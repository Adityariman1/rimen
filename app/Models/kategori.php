<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['keterangan', 'nama_kategori'];
    public $timetamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\kategori', 'id_kategori');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($kategori) {
    //         if ($kategori->buku->count() > 0) {
    //             Alert::error('Failed', 'Data not deleted');
    //             return false;
    //         }
    //     });
    // }

}
