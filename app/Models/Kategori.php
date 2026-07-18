<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
    ];

    /**
     * Relasi ke Artikel
     */
    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
