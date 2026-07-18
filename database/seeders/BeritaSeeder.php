<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $kategoris = Kategori::all();

        if ($users->isEmpty() || $kategoris->isEmpty()) {
            return;
        }

        $judulBerita = [
            'Pemkab Sudiang Bangun Jalan Baru',
            'Harga Cabai Mulai Turun di Pasar',
            'Festival Budaya Sudiang Resmi Dibuka',
            'Sekolah Negeri Raih Juara Nasional',
            'Cuaca Ekstrem Diprediksi Hingga Pekan Depan',
            'UMKM Lokal Tembus Pasar Internasional',
            'Pembangunan Jembatan Hampir Selesai',
            'Pelayanan Rumah Sakit Semakin Meningkat',
            'Wisata Pantai Dipadati Pengunjung',
            'Program Beasiswa Tahun Ini Dibuka'
        ];

        foreach ($judulBerita as $judul) {

            Berita::create([

                'user_id'      => $users->random()->id,

                'kategori_id'  => $kategoris->random()->id,

                'judul'        => $judul,

                'slug'         => Str::slug($judul),

                'gambar'       => null,

                'isi' => '
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Molestias, accusantium, dignissimos. Tempora numquam illo
                exercitationem adipisci, unde repellendus deleniti harum
                asperiores, explicabo tenetur recusandae.</p>

                <p>Berita ini merupakan data dummy yang digunakan sebagai
                contoh pada CMS Blog Berita Sudiang Info.</p>

                <p>Isi berita dapat diganti sesuai kebutuhan aplikasi.</p>
                ',

                'status' => rand(0, 1)
                    ? 'publish'
                    : 'draft',

            ]);
        }
    }
}
