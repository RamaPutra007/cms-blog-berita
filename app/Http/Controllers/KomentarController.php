<?php

namespace App\Http\Controllers;


use App\Models\Komentar;
use Illuminate\Http\Request;



class KomentarController extends Controller
{


    public function store(Request $request)
    {


        $request->validate([


            'artikel_id' => 'required',

            'isi' => 'required|min:3'


        ]);




        Komentar::create([


            'user_id' => auth()->id(),


            'artikel_id' => $request->artikel_id,


            'isi' => $request->isi,


            'parent_id' => null


        ]);





        return back()
            ->with(
                'success',
                'Komentar berhasil dikirim'
            );
    }
}
