<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();


        // jumlah artikel milik penulis
        $artikel = Artikel::where('user_id', $user->id)
            ->count();



        // jumlah berita milik penulis
        $berita = Berita::where('user_id', $user->id)
            ->count();



        // jumlah komentar pada artikel/berita penulis
        $komentar = Komentar::whereHas('artikel', function ($query) use ($user) {

            $query->where('user_id', $user->id);
        })
            ->count();




        // artikel terbaru penulis
        $artikelTerbaru = Artikel::where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();




        // komentar terbaru
        $komentarTerbaru = Komentar::whereHas('artikel', function ($query) use ($user) {

            $query->where('user_id', $user->id);
        })
            ->latest()
            ->limit(5)
            ->get();





        return view('penulis.dashboard', compact(

            'artikel',
            'berita',
            'komentar',
            'artikelTerbaru',
            'komentarTerbaru'

        ));
    }
}
