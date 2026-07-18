<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArtikel = Artikel::where('user_id', auth()->id())->count();

        return view('penulis.dashboard', compact('totalArtikel'));
    }
}
