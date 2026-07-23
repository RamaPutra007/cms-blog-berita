<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel
     */
    public function index()
    {
        $artikels = Artikel::with([
            'kategori',
            'user'
        ])
            ->latest()
            ->paginate(10);

        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Form tambah artikel
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('admin.artikel.create', compact('kategoris'));
    }

    /**
     * Simpan artikel
     */
    public function store(ArtikelRequest $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('artikel', 'public');
        }

        Artikel::create([
            'user_id'      => Auth::id(),
            'kategori_id'  => $request->kategori_id,
            'judul'        => $request->judul,
            'slug'         => Str::slug($request->judul),
            'gambar'       => $gambar,
            'isi'          => $request->isi,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Detail artikel
     */
    public function show(Artikel $artikel)
    {

        $artikel->load([
            'kategori',
            'user',
            'komentars.user',
            'komentars.replies.user'
        ]);


        return view(
            'admin.artikel.show',
            compact('artikel')
        );
    }

    /**
     * Form edit artikel
     */
    public function edit(Artikel $artikel)
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('admin.artikel.edit', compact(
            'artikel',
            'kategoris'
        ));
    }

    /**
     * Update artikel
     */
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        $gambar = $artikel->gambar;

        if ($request->hasFile('gambar')) {

            if ($gambar && Storage::disk('public')->exists($gambar)) {
                Storage::disk('public')->delete($gambar);
            }

            $gambar = $request->file('gambar')
                ->store('artikel', 'public');
        }

        $artikel->update([
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'gambar'      => $gambar,
            'isi'         => $request->isi,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel
     */
    public function destroy(Artikel $artikel)
    {
        if (
            $artikel->gambar &&
            Storage::disk('public')->exists($artikel->gambar)
        ) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
