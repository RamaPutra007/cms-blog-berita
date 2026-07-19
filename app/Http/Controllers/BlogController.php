<?php

namespace App\Http\Controllers;


use App\Models\Artikel;
use App\Models\Komentar;
use Illuminate\Http\Request;



class BlogController extends Controller
{


    public function index()
    {


        $artikels = Artikel::with([
            'kategori',
            'user'
        ])
            ->where('status', 'publish')
            ->latest()
            ->paginate(9);



        return view(
            'blog.index',
            compact('artikels')
        );
    }








    public function show(Artikel $artikel)
    {


        $artikel->load([


            'user',

            'kategori',


            'komentars' => function ($query) {

                $query->whereNull('parent_id')
                    ->latest();
            },


            'komentars.replies.user'


        ]);





        return view(
            'blog.show',
            compact('artikel')
        );
    }









    public function komentar(Request $request, Artikel $artikel)
    {

        $request->validate([

            'nama' => 'required|max:255',

            'email' => 'required|email',

            'isi' => 'required|min:3'

        ]);



        Komentar::create([

            'artikel_id' => $artikel->id,

            'nama' => $request->nama,

            'email' => $request->email,

            'isi' => $request->isi,

        ]);



        return back()->with(
            'success',
            'Komentar berhasil dikirim dan menunggu moderasi.'
        );
    }
}
