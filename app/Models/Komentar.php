<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'artikel_id',
        'parent_id',
        'isi',
    ];



    /*
    |--------------------------------------------------------------------------
    | User pemilik komentar
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }




    /*
    |--------------------------------------------------------------------------
    | Artikel yang dikomentari
    |--------------------------------------------------------------------------
    */

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }





    /*
    |--------------------------------------------------------------------------
    | Komentar utama
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(
            Komentar::class,
            'parent_id'
        );
    }





    /*
    |--------------------------------------------------------------------------
    | Balasan komentar
    |--------------------------------------------------------------------------
    */

    public function replies()
    {
        return $this->hasMany(
            Komentar::class,
            'parent_id'
        );
    }
}
