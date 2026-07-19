<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | DATA ARTIKEL
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        $artikel = Artikel::where(
            'user_id',
            Auth::id()
        )
            ->latest()
            ->paginate(10);



        return view(
            'penulis.artikel.index',
            compact('artikel')
        );
    }





    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */


    public function create()
    {

        $kategoris = Kategori::all();

        return view('penulis.artikel.create', compact('kategoris'));
    }





    public function store(Request $request)
    {

        $request->validate([

            'kategori_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required'

        ]);



        $gambar = null;


        if ($request->hasFile('gambar')) {


            $gambar = $request
                ->file('gambar')
                ->store('artikel', 'public');
        }



        Artikel::create([


            'user_id' => auth()->id(),

            'kategori_id' => $request->kategori_id,

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'isi' => $request->isi,

            'gambar' => $gambar,

            'status' => $request->status


        ]);




        return redirect()
            ->route('penulis.artikel.index')
            ->with(
                'success',
                'Artikel berhasil dibuat'
            );
    }
    /*
    |--------------------------------------------------------------------------
    | DETAIL
    |--------------------------------------------------------------------------
    */


    public function show(Artikel $artikel)
    {


        return view(
            'penulis.artikel.show',
            compact('artikel')
        );
    }








    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */


    public function edit(Artikel $artikel)
    {


        $kategoris = Kategori::all();

        return view('penulis.artikel.edit', compact(
            'artikel',
            'kategoris'
        ));
    }









    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */


    public function update(Request $request, Artikel $artikel)
    {



        $request->validate([


            'kategori_id' => 'required',

            'judul' => 'required',

            'isi' => 'required',

            'status' => 'required'


        ]);






        $artikel->update([


            'kategori_id' => $request->kategori_id,

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'isi' => $request->isi,

            'status' => $request->status


        ]);






        return redirect()

            ->route('penulis.artikel.index')

            ->with(
                'success',
                'Artikel berhasil diperbarui'
            );
    }









    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */


    public function destroy(Artikel $artikel)
    {



        if ($artikel->gambar) {


            Storage::disk('public')
                ->delete($artikel->gambar);
        }




        $artikel->delete();





        return redirect()

            ->route('penulis.artikel.index')

            ->with(
                'success',
                'Artikel berhasil dihapus'
            );
    }
}
