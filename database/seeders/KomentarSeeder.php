<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Komentar;

class KomentarSeeder extends Seeder
{

    public function run(): void
    {

        Komentar::create([

            'artikel_id' => 1,

            'nama' => 'Rama',

            'email' => 'rama@gmail.com',

            'isi' => 'Artikel ini sangat menarik'

        ]);



        Komentar::create([

            'artikel_id' => 1,

            'nama' => 'Budi',

            'email' => 'budi@gmail.com',

            'isi' => 'Informasi yang sangat bermanfaat'

        ]);
    }
}
