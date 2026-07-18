<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('penulis.profile');
    }

    public function edit()
    {
        return view('penulis.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
