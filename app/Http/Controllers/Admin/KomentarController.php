<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;


class KomentarController extends Controller
{


    /**
     * Menampilkan semua komentar
     */
    public function index()
    {

        $komentars = Komentar::with([
            'artikel',
            'replies'
        ])
            ->whereNull('parent_id')
            ->latest()
            ->paginate(10);


        return view(
            'admin.komentar.index',
            compact('komentars')
        );
    }




    /**
     * Balas komentar
     */
    public function reply(Request $request, Komentar $komentar)
    {

        $request->validate([
            'isi' => 'required'
        ]);


        Komentar::create([

            'artikel_id' => $komentar->artikel_id,

            'parent_id' => $komentar->id,

            'nama' => auth()->user()->name,

            'email' => auth()->user()->email,

            'isi' => $request->isi

        ]);


        return back()->with(
            'success',
            'Balasan berhasil dikirim'
        );
    }






    /**
     * Hapus balasan admin
     */
    public function destroyReply(
        Komentar $reply
    ) {



        $reply->delete();




        return back()
            ->with(
                'success',
                'Balasan berhasil dihapus'
            );
    }
}
