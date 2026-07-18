<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Berita extends Model
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {

            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::updating(function ($berita) {

            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
