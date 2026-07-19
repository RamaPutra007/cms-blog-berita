<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ArtikelResource extends JsonResource
{


    public function toArray(Request $request): array
    {

        return [

            /*
            |--------------------------------------------------------------------------
            | DATA ARTIKEL
            |--------------------------------------------------------------------------
            */

            'id' => $this->id,


            'judul' => $this->judul,


            'slug' => $this->slug,

            // URL gambar artikel
            'gambar' => $this->gambar
                ? asset('storage/' . $this->gambar)
                : null,

            'isi' => $this->isi,

            'status' => $this->status,

            /*
            |--------------------------------------------------------------------------
            | PENULIS
            |--------------------------------------------------------------------------
            */


            'penulis' => [


                'id' => $this->user?->id,


                'nama' => $this->user?->name,



                // URL foto penulis
                'foto' => $this->user?->foto
                    ? asset('storage/' . $this->user->foto)
                    : null,

            ],

            /*
            |--------------------------------------------------------------------------
            | KATEGORI
            |--------------------------------------------------------------------------
            */


            'kategori' => [


                'id' => $this->kategori?->id,


                'nama' => $this->kategori?->nama,


                'slug' => $this->kategori?->slug,


            ],

            /*
            |--------------------------------------------------------------------------
            | KOMENTAR DAN BALASAN
            |--------------------------------------------------------------------------
            */


            'komentar' => $this->whenLoaded(
                'komentars',

                function () {


                    return $this->komentars
                        ->where('parent_id', null)
                        ->map(function ($komentar) {


                            return [


                                'id' => $komentar->id,


                                'nama' => $komentar->nama,


                                'email' => $komentar->email,


                                'isi' => $komentar->isi,



                                'tanggal' => $komentar->created_at
                                    ? $komentar->created_at->format('d M Y H:i')
                                    : null,

                                /*
                                |--------------------------------------------------------------------------
                                | BALASAN KOMENTAR
                                |--------------------------------------------------------------------------
                                */


                                'balasan' => $komentar->replies
                                    ->map(function ($reply) {


                                        return [


                                            'id' => $reply->id,


                                            'nama' => $reply->nama
                                                ?? $reply->user?->name
                                                ?? 'Admin',



                                            'isi' => $reply->isi,



                                            'tanggal' => $reply->created_at
                                                ? $reply->created_at->format('d M Y H:i')
                                                : null,


                                        ];
                                    }),



                            ];
                        });
                }
            ),

            /*
            |--------------------------------------------------------------------------
            | TIMESTAMP
            |--------------------------------------------------------------------------
            */

            'created_at' => $this->created_at,


            'updated_at' => $this->updated_at,

        ];
    }
}
