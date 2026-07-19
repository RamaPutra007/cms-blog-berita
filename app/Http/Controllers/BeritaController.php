<?php


namespace App\Http\Controllers;


use App\Models\Berita;



class BeritaController extends Controller
{


    public function index()
    {



        $berita = Berita::with([

            'kategori',
            'user'

        ])

            ->where(
                'status',
                'publish'
            )

            ->latest()

            ->paginate(9);





        return view(

            'berita.index',

            compact('berita')

        );
    }








    public function show(Berita $berita)
    {



        abort_if(

            $berita->status != 'publish',

            404

        );




        $berita->load([

            'kategori',
            'user'

        ]);




        return view(

            'berita.show',

            compact('berita')

        );
    }
}
