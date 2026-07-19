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
        Kategori::insert([


            [
                'nama' => 'Teknologi',
                'slug' => 'teknologi'
            ],


            [
                'nama' => 'Pendidikan',
                'slug' => 'pendidikan'
            ],


            [
                'nama' => 'Olahraga',
                'slug' => 'olahraga'
            ],


            [
                'nama' => 'Politik',
                'slug' => 'politik'
            ]


        ]);
    }
}
