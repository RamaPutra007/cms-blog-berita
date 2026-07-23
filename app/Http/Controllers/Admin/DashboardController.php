<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArtikel = Artikel::count();
        $totalKategori = Kategori::count();
        $totalUser = User::count();
        $totalPenulis = User::where('role', 'penulis')->count();

        return view('admin.dashboard', compact(
            'totalArtikel',
            'totalKategori',
            'totalUser',
            'totalPenulis'
        ));
    }
}
