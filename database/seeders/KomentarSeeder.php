<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Komentar;
use App\Models\User;
use App\Models\Artikel;



class KomentarSeeder extends Seeder
{


    public function run(): void
    {


        $user = User::first();

        $artikel = Artikel::first();



        $komentar = Komentar::create([

            'user_id' => $user->id,

            'artikel_id' => $artikel->id,

            'isi' => 'Artikel ini sangat menarik'

        ]);





        Komentar::create([

            'user_id' => $user->id,

            'artikel_id' => $artikel->id,

            'parent_id' => $komentar->id,

            'isi' => 'Terima kasih atas komentarnya'

        ]);
    }
}
