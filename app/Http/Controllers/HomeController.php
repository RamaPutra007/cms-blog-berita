<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Kategori;

class HomeController extends Controller
{

    public function index()
    {

        $kategori = Kategori::latest()
            ->get();


        $berita = Berita::with('kategori')
            ->where('status', 'publish')
            ->latest()
            ->take(6)
            ->get();



        $artikel = Artikel::with('kategori')
            ->where('status', 'publish')
            ->latest()
            ->take(6)
            ->get();



        return view('home', compact(
            'kategori',
            'berita',
            'artikel'
        ));
    }





    public function tentang()
    {
        $jumlahBerita = Berita::where('status', 'publish')
            ->count();

        $jumlahArtikel = Artikel::where('status', 'publish')
            ->count();

        $jumlahKategori = Kategori::count();


        return view('tentang', compact(
            'jumlahBerita',
            'jumlahArtikel',
            'jumlahKategori'
        ));
    }
}
