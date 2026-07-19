<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BeritaController extends Controller
{


    public function index(Request $request)
    {


        $berita = Berita::with([
            'kategori',
            'user'
        ])

            ->where(
                'user_id',
                Auth::id()
            )

            ->when(
                $request->search,
                function ($query) use ($request) {

                    $query->where(
                        'judul',
                        'like',
                        '%' . $request->search . '%'
                    );
                }
            )

            ->latest()
            ->paginate(10);



        return view(
            'penulis.berita.index',
            compact('berita')
        );
    }







    public function create()
    {


        $kategoris = Kategori::all();



        return view(
            'penulis.berita.create',
            compact('kategoris')
        );
    }








    public function store(Request $request)
    {


        $data = $request->validate([


            'kategori_id' => 'required',

            'judul' => 'required',

            'isi' => 'required',

            'gambar' => 'nullable|image|max:2048',

            'status' => 'required'


        ]);




        $data['user_id'] = Auth::id();


        $data['slug'] =
            Str::slug($request->judul);






        if ($request->hasFile('gambar')) {


            $data['gambar'] =
                $request
                ->file('gambar')
                ->store(
                    'berita',
                    'public'
                );
        }





        Berita::create($data);




        return redirect()
            ->route('penulis.berita.index')
            ->with(
                'success',
                'Berita berhasil ditambahkan'
            );
    }








    public function show(Berita $berita)
    {


        return view(
            'penulis.berita.show',
            compact('berita')
        );
    }








    public function edit(Berita $berita)
    {


        $kategoris =
            Kategori::all();



        return view(
            'penulis.berita.edit',
            compact(
                'berita',
                'kategoris'
            )
        );
    }









    public function update(Request $request, Berita $berita)
    {


        $data = $request->validate([


            'kategori_id' => 'required',

            'judul' => 'required',

            'isi' => 'required',

            'status' => 'required'


        ]);




        $data['slug'] =
            Str::slug($request->judul);




        $berita->update($data);




        return redirect()
            ->route('penulis.berita.index')
            ->with(
                'success',
                'Berita berhasil diperbarui'
            );
    }










    public function destroy(Berita $berita)
    {



        if ($berita->gambar) {


            Storage::disk('public')
                ->delete(
                    $berita->gambar
                );
        }




        $berita->delete();



        return redirect()
            ->route('penulis.berita.index')
            ->with(
                'success',
                'Berita berhasil dihapus'
            );
    }
}
