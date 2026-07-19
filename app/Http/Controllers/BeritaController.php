<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{


    public function index()
    {

        $beritas = Berita::with([
            'user',
            'kategori'
        ])
            ->latest()
            ->paginate(9);



        return view(
            'berita.index',
            compact('beritas')
        );
    }





    public function show(Berita $berita)
    {

        $berita->load([
            'user',
            'kategori'
        ]);


        return view(
            'berita.show',
            compact('berita')
        );
    }
}
