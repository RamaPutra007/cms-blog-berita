<?php

namespace App\Http\Controllers;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }

    public function show($id)
    {
        return view('kategori.show', compact('id'));
    }
}
