<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'slug',
        'gambar',
        'isi',
        'status',
    ];

    /**
     * Relasi ke User (Penulis)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
