<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita milik penulis.
     */
    public function index()
    {
        $beritas = Artikel::with('kategori')
            ->where('jenis', 'berita')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('penulis.berita.index', compact('beritas'));
    }

    /**
     * Form tambah berita.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('penulis.berita.create', compact('kategoris'));
    }

    /**
     * Simpan berita.
     */
    public function store(ArtikelRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['jenis'] = 'berita';
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Artikel::create($data);

        return redirect()
            ->route('penulis.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Detail berita.
     */
    public function show(Artikel $beritum)
    {
        abort_if(
            $beritum->jenis !== 'berita' ||
                $beritum->user_id != Auth::id(),
            403
        );

        return view('penulis.berita.show', [
            'berita' => $beritum
        ]);
    }

    /**
     * Form edit berita.
     */
    public function edit(Artikel $beritum)
    {
        abort_if(
            $beritum->jenis !== 'berita' ||
                $beritum->user_id != Auth::id(),
            403
        );

        $kategoris = Kategori::orderBy('nama')->get();

        return view('penulis.berita.edit', [
            'berita' => $beritum,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Update berita.
     */
    public function update(ArtikelRequest $request, Artikel $beritum)
    {
        abort_if(
            $beritum->jenis !== 'berita' ||
                $beritum->user_id != Auth::id(),
            403
        );

        $data = $request->validated();

        $data['slug'] = Str::slug($request->judul);
        $data['jenis'] = 'berita';

        if ($request->hasFile('gambar')) {

            if (
                $beritum->gambar &&
                Storage::disk('public')->exists($beritum->gambar)
            ) {
                Storage::disk('public')->delete($beritum->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $beritum->update($data);

        return redirect()
            ->route('penulis.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita.
     */
    public function destroy(Artikel $beritum)
    {
        abort_if(
            $beritum->jenis !== 'berita' ||
                $beritum->user_id != Auth::id(),
            403
        );

        if (
            $beritum->gambar &&
            Storage::disk('public')->exists($beritum->gambar)
        ) {
            Storage::disk('public')->delete($beritum->gambar);
        }

        $beritum->delete();

        return redirect()
            ->route('penulis.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
