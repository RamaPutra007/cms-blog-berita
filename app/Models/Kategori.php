<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $fillable = [

        'nama',
        'slug'

    ];



    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }



    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
