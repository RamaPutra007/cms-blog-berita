<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

    protected $fillable = [
        'artikel_id',
        'user_id',
        'parent_id',
        'nama',
        'email',
        'isi'
    ];



    /*
    |--------------------------------------------------------------------------
    | Artikel
    |--------------------------------------------------------------------------
    */

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }



    /*
    |--------------------------------------------------------------------------
    | User Admin / Penulis
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    /*
    |--------------------------------------------------------------------------
    | Reply Komentar
    |--------------------------------------------------------------------------
    */

    public function replies()
    {
        return $this->hasMany(
            Komentar::class,
            'parent_id'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Parent Komentar
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(
            Komentar::class,
            'parent_id'
        );
    }
}
