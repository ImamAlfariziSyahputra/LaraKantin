<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori'];

    public function barang()
    {
        return $this->hasMany('App\Barang', 'id_kategori', 'id');
    }
}
