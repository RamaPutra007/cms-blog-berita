<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtikelApiController;



Route::get('/artikel', [

    ArtikelApiController::class,

    'index'

]);



Route::get('/artikel/{artikel}', [

    ArtikelApiController::class,

    'show'

]);
