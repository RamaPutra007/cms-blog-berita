<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $kategori = Kategori::first();

        if (!$user || !$kategori) {
            return;
        }

        for ($i = 1; $i <= 10; $i++) {

            Artikel::create([

                'user_id' => $user->id,

                'kategori_id' => $kategori->id,

                'judul' => "Artikel $i",

                'slug' => Str::slug("Artikel $i"),

                'gambar' => null,

                'isi' => "Ini adalah isi artikel ke-$i.",

                'status' => 'publish',

            ]);
        }
    }
}
