<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $fillable = [

        'user_id',
        'kategori_id',
        'judul',
        'slug',
        'gambar',
        'isi',
        'status'

    ];



    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
    |--------------------------------------------------------------------------
    | Komentar berita jika diperlukan
    |--------------------------------------------------------------------------
    */

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
