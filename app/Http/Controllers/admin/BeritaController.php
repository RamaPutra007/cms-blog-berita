<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{

    /**
     * Tampilkan semua berita
     */
    public function index()
    {
        $beritas = Berita::with([
            'user',
            'kategori'
        ])
            ->latest()
            ->paginate(10);


        return view(
            'admin.berita.index',
            compact('beritas')
        );
    }



    /**
     * Form tambah berita
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama')
            ->get();


        return view(
            'admin.berita.create',
            compact('kategoris')
        );
    }




    /**
     * Simpan berita
     */
    public function store(ArtikelRequest $request)
    {

        $data = $request->validated();


        $data['user_id'] = auth()->id();



        // membuat slug unik
        $slug = Str::slug($request->judul);

        $original = $slug;

        $i = 1;


        while (
            Berita::where('slug', $slug)->exists()
        ) {

            $slug = $original . '-' . $i++;
        }


        $data['slug'] = $slug;




        // upload gambar
        if ($request->hasFile('gambar')) {


            $data['gambar'] =
                $request->file('gambar')
                ->store('berita', 'public');
        }




        Berita::create($data);



        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil ditambahkan.'
            );
    }





    /**
     * Detail berita
     */
    public function show(Berita $berita)
    {

        $berita->load([
            'user',
            'kategori'
        ]);



        return view(
            'admin.berita.show',
            compact('berita')
        );
    }





    /**
     * Form edit
     */
    public function edit(Berita $berita)
    {

        $kategoris = Kategori::orderBy('nama')
            ->get();



        return view(
            'admin.berita.edit',
            compact(
                'berita',
                'kategoris'
            )
        );
    }





    /**
     * Update berita
     */
    public function update(
        ArtikelRequest $request,
        Berita $berita
    ) {

        $data = $request->validated();



        // slug baru
        $slug = Str::slug($request->judul);

        $original = $slug;

        $i = 1;



        while (
            Berita::where('slug', $slug)
            ->where('id', '!=', $berita->id)
            ->exists()
        ) {

            $slug = $original . '-' . $i++;
        }



        $data['slug'] = $slug;




        // upload gambar baru
        if ($request->hasFile('gambar')) {


            if (
                $berita->gambar &&
                Storage::disk('public')
                ->exists($berita->gambar)
            ) {

                Storage::disk('public')
                    ->delete($berita->gambar);
            }



            $data['gambar'] =
                $request->file('gambar')
                ->store('berita', 'public');
        }





        $berita->update($data);



        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil diperbarui.'
            );
    }





    /**
     * Hapus berita
     */
    public function destroy(Berita $berita)
    {


        if (
            $berita->gambar &&
            Storage::disk('public')
            ->exists($berita->gambar)
        ) {

            Storage::disk('public')
                ->delete($berita->gambar);
        }



        $berita->delete();



        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil dihapus.'
            );
    }
}
