<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $fillable = [
        'nama',
        'slug'
    ];



    /*
    |--------------------------------------------------------------------------
    | Relasi Artikel
    |--------------------------------------------------------------------------
    */

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }



    /*
    |--------------------------------------------------------------------------
    | Relasi Berita
    |--------------------------------------------------------------------------
    */

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
