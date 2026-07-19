<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelResource;
use App\Models\Artikel;



class ArtikelApiController extends Controller
{


    public function index()
    {


        $artikel = Artikel::with([

            'user',

            'kategori'

        ])
            ->where('status', 'publish')
            ->latest()
            ->get();



        return response()->json([

            'status' => true,

            'data' => ArtikelResource::collection($artikel)

        ]);
    }






    public function show(Artikel $artikel)
    {


        $artikel->load([

            'user',

            'kategori',


            'komentars' => function ($query) {

                $query->whereNull('parent_id');
            },


            'komentars.replies'


        ]);



        return response()->json([

            'status' => true,

            'data' => new ArtikelResource($artikel)

        ]);
    }
}
