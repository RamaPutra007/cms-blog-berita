<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PUBLIC CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;


/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KomentarController as AdminKomentarController;



/*
|--------------------------------------------------------------------------
| PENULIS CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Penulis\DashboardController as PenulisDashboardController;
use App\Http\Controllers\Penulis\ArtikelController as PenulisArtikelController;
use App\Http\Controllers\Penulis\BeritaController as PenulisBeritaController;
use App\Http\Controllers\Penulis\KomentarController as PenulisKomentarController;
use App\Http\Controllers\Penulis\ProfileController as PenulisProfileController;



/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('/tentang', [HomeController::class, 'tentang'])
    ->name('tentang');



/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/


Route::get(
    '/blog',
    [BlogController::class, 'index']
)->name('blog.index');


Route::get(
    '/blog/{artikel:slug}',
    [BlogController::class, 'show']
)->name('blog.show');


Route::post(
    '/blog/{artikel:slug}/komentar',
    [BlogController::class, 'komentar']
)->name('blog.komentar');



/*
|--------------------------------------------------------------------------
| BERITA PUBLIC
|--------------------------------------------------------------------------
*/


Route::get(
    '/berita',
    [BeritaController::class, 'index']
)->name('berita.index');


Route::get(
    '/berita/{berita:slug}',
    [BeritaController::class, 'show']
)->name('berita.show');



/*
|--------------------------------------------------------------------------
| KATEGORI
|--------------------------------------------------------------------------
*/


Route::get(
    '/kategori',
    [KategoriController::class, 'index']
)->name('kategori.index');


Route::get(
    '/kategori/{kategori:slug}',
    [KategoriController::class, 'show']
)->name('kategori.show');





/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {



        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');



        /*
    | CRUD
    */

        Route::resource(
            'users',
            UserController::class
        );


        Route::resource(
            'kategori',
            AdminKategoriController::class
        );


        Route::resource(
            'artikel',
            AdminArtikelController::class
        );


        Route::resource(
            'berita',
            AdminBeritaController::class
        )->parameters([
            'berita' => 'berita'
        ]);



        /*
    | KOMENTAR ADMIN
    */


        Route::get(
            '/komentar',
            [AdminKomentarController::class, 'index']
        )->name('komentar.index');



        Route::delete(
            '/komentar/{komentar}',
            [AdminKomentarController::class, 'destroy']
        )->name('komentar.destroy');



        Route::post(
            '/komentar/{komentar}/reply',
            [AdminKomentarController::class, 'reply']
        )->name('komentar.reply');



        Route::delete(
            '/komentar/reply/{reply}',
            [AdminKomentarController::class, 'destroyReply']
        )->name('komentar.reply.destroy');
    });







/*
|--------------------------------------------------------------------------
| PENULIS AREA
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'penulis'])
    ->prefix('penulis')
    ->name('penulis.')
    ->group(function () {



        Route::get(
            '/dashboard',
            [PenulisDashboardController::class, 'index']
        )->name('dashboard');



        /*
    | ARTIKEL PENULIS
    */


        Route::resource(
            'artikel',
            PenulisArtikelController::class
        );



        /*
    | BERITA PENULIS
    */


        Route::resource(
            'berita',
            PenulisBeritaController::class
        )->parameters([
            'berita' => 'berita'
        ]);





        // komentar penulis

        Route::get(
            '/komentar',
            [PenulisKomentarController::class, 'index']
        )->name('komentar.index');


        Route::post(
            '/komentar/{komentar}/reply',
            [PenulisKomentarController::class, 'reply']
        )->name('komentar.reply');


        // hapus komentar artikel sendiri

        Route::delete(
            '/komentar/{komentar}',
            [PenulisKomentarController::class, 'destroy']
        )->name('komentar.destroy');


        // hapus balasan sendiri

        Route::delete(
            '/komentar/reply/{reply}',
            [PenulisKomentarController::class, 'destroyReply']
        )->name('komentar.reply.destroy');


        /*
    | PROFILE PENULIS
    */


        Route::get(
            '/profile',
            [PenulisProfileController::class, 'index']
        )->name('profile');



        Route::put(
            '/profile',
            [PenulisProfileController::class, 'update']
        )->name('profile.update');
    });





/*
|--------------------------------------------------------------------------
| REDIRECT DASHBOARD
|--------------------------------------------------------------------------
*/


Route::middleware('auth')
    ->get('/dashboard', function () {


        if (auth()->user()->role == 'admin') {

            return redirect()
                ->route('admin.dashboard');
        }


        return redirect()
            ->route('penulis.dashboard');
    })
    ->name('dashboard');





require __DIR__ . '/auth.php';
