<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Komentar;

use Illuminate\Http\Request;



class KomentarController extends Controller
{


    public function index()
    {


        $komentars = Komentar::with([
            'user',
            'artikel',
            'replies.user'
        ])
            ->whereNull('parent_id')
            ->latest()
            ->paginate(10);

        return view(
            'admin.komentar.index',
            compact('komentars')
        );
    }






    public function reply(Request $request, Komentar $komentar)
    {

        $request->validate([
            'isi' => 'required|string'
        ]);


        Komentar::create([

            'user_id' => auth()->id(),

            'artikel_id' => $komentar->artikel_id,

            'parent_id' => $komentar->id,

            'isi' => $request->isi,

        ]);


        return back()
            ->with(
                'success',
                'Balasan berhasil dikirim.'
            );
    }





    public function destroy(
        Komentar $komentar
    ) {


        $komentar->delete();



        return back()->with(
            'success',
            'Komentar berhasil dihapus'
        );
    }
}
