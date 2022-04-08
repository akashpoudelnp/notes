<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        Route::get('/', [HomeController::class,'index'])->middleware('auth')->name('home');

        Route::get('/create', [HomeController::class,'create'])->middleware('auth');

        Route::get('/edit/{note}', [HomeController::class,'edit'])->middleware('auth')->name('edit');

        Route::post('/update/{note}', [HomeController::class,'update'])->middleware('auth')->name('update');

        Route::get('/delete/{note}', [HomeController::class,'delete'])->middleware('auth')->name('delete');

        Route::post('/storenote', [HomeController::class,'storenote'])->middleware('auth')->name('storenote');
