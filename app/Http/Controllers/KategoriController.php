<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{


    public function index()
    {

        $kategoris = Kategori::withCount([
            'artikels',
            'beritas'
        ])
            ->latest()
            ->get();



        return view(
            'kategori.index',
            compact('kategoris')
        );
    }





    public function show($slug)
    {


        $kategori = Kategori::where('slug', $slug)
            ->firstOrFail();



        $artikels = $kategori
            ->artikels()
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);



        $beritas = $kategori
            ->beritas()
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);



        return view(
            'kategori.show',
            compact(
                'kategori',
                'artikels',
                'beritas'
            )
        );
    }
}
