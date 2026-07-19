<?php

namespace App\Http\Controllers\Penulis;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{


    public function index()
    {

        return view(
            'penulis.profile.index'
        );
    }







    public function update(Request $request)
    {


        $request->validate([


            'name' => 'required|max:255',

            'email' => 'required|email',

            'foto' => 'nullable|image|max:2048',

            'password' => 'nullable|min:8'


        ]);





        $user = Auth::user();





        $user->name =
            $request->name;



        $user->email =
            $request->email;








        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */


        if ($request->hasFile('foto')) {



            // hapus foto lama


            if ($user->foto) {


                Storage::disk('public')
                    ->delete(

                        'profile/' . $user->foto

                    );
            }







            $filename =
                $request->file('foto')
                ->store(
                    'profile',
                    'public'
                );







            $user->foto =
                str_replace(
                    'profile/',
                    '',
                    $filename
                );
        }








        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */


        if ($request->password) {



            $user->password =

                Hash::make(
                    $request->password
                );
        }






        $user->save();






        return back()

            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}
