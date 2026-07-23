<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('artikels')
            ->latest()
            ->paginate(10);

        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(KategoriRequest $request)
    {
        Kategori::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
