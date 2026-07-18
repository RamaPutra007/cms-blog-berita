<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create([

            'name' => 'Admin',

            'email' => 'admin@gmail.com',

            'password' => Hash::make('password'),

            'role' => 'admin',

        ]);



        User::create([

            'name' => 'Penulis',

            'email' => 'penulis@gmail.com',

            'password' => Hash::make('password'),

            'role' => 'penulis',

        ]);
    }
}
