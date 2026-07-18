<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel milik penulis.
     */
    public function index()
    {
        $artikels = Artikel::with(['kategori', 'user'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('penulis.artikel.index', compact('artikels'));
    }

    /**
     * Form tambah artikel.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('penulis.artikel.create', compact('kategoris'));
    }

    /**
     * Simpan artikel.
     */
    public function store(ArtikelRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Detail artikel.
     */
    public function show(Artikel $blog)
    {
        abort_if($blog->user_id != Auth::id(), 403);

        return view('penulis.blog.show', [
            'artikel' => $blog
        ]);
    }

    /**
     * Form edit artikel.
     */
    public function edit(Artikel $artikel)
    {
        abort_if($artikel->user_id != Auth::id(), 403);

        $kategoris = Kategori::orderBy('nama')->get();

        return view('penulis.artikel.edit', [
            'artikel' => $artikel,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Update artikel.
     */
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        abort_if($artikel->user_id != Auth::id(), 403);

        $data = $request->validated();

        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {

            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel.
     */
    public function destroy(Artikel $artikel)
    {
        abort_if($artikel->user_id != Auth::id(), 403);

        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
