<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;


class KomentarController extends Controller
{


    public function index()
    {

        $komentars = Komentar::with([
            'artikel',
            'replies.user'
        ])

            // hanya artikel milik penulis login

            ->whereNull('parent_id')

            ->whereHas('artikel', function ($query) {

                $query->where(
                    'user_id',
                    auth()->id()
                );
            })

            ->latest()

            ->paginate(10);



        return view(
            'penulis.komentar.index',
            compact('komentars')
        );
    }





    public function reply(
        Request $request,
        Komentar $komentar
    ) {


        $request->validate([
            'isi' => 'required|string'
        ]);



        // cek artikel milik penulis

        abort_unless(
            $komentar->artikel->user_id == auth()->id(),
            403
        );



        Komentar::create([


            'artikel_id' => $komentar->artikel_id,

            'parent_id' => $komentar->id,

            'user_id' => auth()->id(),

            'nama' => auth()->user()->name,

            'email' => auth()->user()->email,

            'isi' => $request->isi

        ]);



        return back()->with(
            'success',
            'Balasan berhasil dikirim'
        );
    }







    public function destroy(
        Komentar $komentar
    ) {


        // hanya artikel sendiri


        abort_unless(
            $komentar->artikel->user_id == auth()->id(),
            403
        );



        $komentar->delete();



        return back()->with(
            'success',
            'Komentar berhasil dihapus'
        );
    }







    public function destroyReply(
        Komentar $reply
    ) {


        // cek artikel induk


        abort_unless(
            $reply->artikel->user_id == auth()->id(),
            403
        );



        $reply->delete();



        return back()->with(
            'success',
            'Balasan berhasil dihapus'
        );
    }
}
