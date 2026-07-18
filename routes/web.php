<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;


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
use App\Http\Controllers\Admin\KomentarController;


/*
|--------------------------------------------------------------------------
| PENULIS CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Penulis\DashboardController as PenulisDashboardController;
use App\Http\Controllers\Penulis\ArtikelController as PenulisArtikelController;
use App\Http\Controllers\Penulis\BeritaController as PenulisBeritaController;
use App\Http\Controllers\Penulis\ProfileController as PenulisProfileController;



/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('/tentang', [HomeController::class, 'tentang'])
    ->name('tentang');



/*
|--------------------------------------------------------------------------
| BLOG (ARTIKEL)
|--------------------------------------------------------------------------
*/


Route::get(
    '/blog',
    [BlogController::class, 'index']
)
    ->name('blog.index');


Route::get(
    '/blog/{artikel}',
    [BlogController::class, 'show']
)
    ->name('blog.show');



/*
|--------------------------------------------------------------------------
| BERITA PUBLIC
|--------------------------------------------------------------------------
*/


Route::get(
    '/berita',
    [BeritaController::class, 'index']
)
    ->name('berita.index');


Route::get(
    '/berita/{berita}',
    [BeritaController::class, 'show']
)
    ->name('berita.show');



/*
|--------------------------------------------------------------------------
| KATEGORI
|--------------------------------------------------------------------------
*/


Route::get(
    '/kategori',
    [KategoriController::class, 'index']
)
    ->name('kategori.index');


Route::get(
    '/kategori/{kategori}',
    [KategoriController::class, 'show']
)
    ->name('kategori.show');




/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {



        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )
            ->name('dashboard');



        // USER
        Route::resource(
            'users',
            UserController::class
        );



        // KATEGORI
        Route::resource(
            'kategori',
            AdminKategoriController::class
        );



        // BLOG ARTIKEL
        Route::resource(
            'artikel',
            AdminArtikelController::class
        );



        // BERITA
        Route::resource(
            'berita',
            AdminBeritaController::class
        )
            ->parameters([
                'berita' => 'berita'
            ]);



        // KOMENTAR
        Route::resource(
            'komentar',
            KomentarController::class
        )
            ->only([
                'index',
                'destroy'
            ]);


        Route::post(
            'komentar/{komentar}/reply',
            [KomentarController::class, 'reply']
        )->name('komentar.reply');
    });

/*
|--------------------------------------------------------------------------
| PENULIS
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'penulis'])
    ->prefix('penulis')
    ->name('penulis.')
    ->group(function () {



        Route::get(
            '/dashboard',
            [PenulisDashboardController::class, 'index']
        )
            ->name('dashboard');



        // BLOG
        Route::resource(
            'artikel',
            PenulisArtikelController::class
        );



        // BERITA
        Route::resource(
            'berita',
            PenulisBeritaController::class
        )
            ->parameters([
                'berita' => 'berita'
            ]);



        // PROFILE
        Route::get(
            '/profile',
            [PenulisProfileController::class, 'index']
        )
            ->name('profile');


        Route::put(
            '/profile',
            [PenulisProfileController::class, 'update']
        )
            ->name('profile.update');
    });





/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
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




Route::resource(
    'komentar',
    KomentarController::class
)
    ->only([
        'index',
        'destroy'
    ]);
/*
|--------------------------------------------------------------------------
| PROFILE BREEZE
|--------------------------------------------------------------------------
*/


Route::middleware('auth')
    ->group(function () {


        Route::get(
            '/profile',
            [ProfileController::class, 'edit']
        )
            ->name('profile.edit');


        Route::patch(
            '/profile',
            [ProfileController::class, 'update']
        )
            ->name('profile.update');


        Route::delete(
            '/profile',
            [ProfileController::class, 'destroy']
        )
            ->name('profile.destroy');
    });



require __DIR__ . '/auth.php';
