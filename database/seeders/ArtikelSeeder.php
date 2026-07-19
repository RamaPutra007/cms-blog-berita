<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {

        Artikel::create([

            'user_id' => 1,

            'kategori_id' => 1,

            'judul' => 'Artikel 1',

            'slug' => Str::slug('Artikel 1'),

            'isi' => 'Ini adalah isi artikel pertama',

            'gambar' => null,

            'status' => 'publish'

        ]);



        Artikel::create([

            'user_id' => 1,

            'kategori_id' => 2,

            'judul' => 'Artikel 2',

            'slug' => Str::slug('Artikel 2'),

            'isi' => 'Ini adalah isi artikel kedua',

            'gambar' => null,

            'status' => 'publish'

        ]);
    }
}
