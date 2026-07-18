<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Teknologi',
            'Pendidikan',
            'Olahraga',
            'Politik',
            'Ekonomi',
            'Kesehatan',
        ];

        foreach ($kategori as $item) {
            Kategori::create([
                'nama' => $item,
                'slug' => Str::slug($item),
            ]);
        }
    }
}
