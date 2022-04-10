<?php

use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
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
        // Frontend User Routes
        Route::get('/', [HomeController::class,'index'])->middleware('auth')->name('home');
        Route::get('/create', [HomeController::class,'create'])->middleware('auth');
        Route::get('/edit/{note}', [HomeController::class,'edit'])->middleware('auth')->name('edit');
        Route::post('/update/{note}', [HomeController::class,'update'])->middleware('auth')->name('update');
        Route::get('/delete/{note}', [HomeController::class,'delete'])->middleware('auth')->name('delete');
        Route::post('/storenote', [HomeController::class,'storenote'])->middleware('auth')->name('storenote');

        //Admin Routes
        Route::middleware('auth','isactive')->prefix('/admin')->name('admin.')->group(function () {
                Route::get('/',[AdminHomeController::class,'index'])->name('index');
                Route::resource('users',UserController::class);
                Route::resource('roles',RolesController::class);
                Route::resource('permissions',PermissionController::class);
                Route::get('roles/{role}/permission',[RolesController::class,'addperm'])->name('addperm');
                Route::post('storeperm',[RolesController::class,'storeperm'])->name('storeperm');
        });
