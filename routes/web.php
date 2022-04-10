<?php

use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\BlogController;
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
        Route::get('/', [HomeController::class,'index'])->name('home');
        //Frontend Blog
        Route::resource('blogs',BlogController::class)->middleware('auth');

        //Admin Routes
        Route::middleware('auth','permission:can_dashboard')->prefix('/admin')->name('admin.')->group(function () {
                Route::get('/',[AdminHomeController::class,'index'])->name('index');
                Route::resource('users',UserController::class)->middleware('permission:can_crud_users');
                Route::resource('roles',RolesController::class)->middleware('permission:can_crud_roles');
                Route::resource('permissions',PermissionController::class)->middleware('permission:can_crud_permissions');
                Route::get('roles/{role}/permission',[RolesController::class,'addperm'])->middleware('permission:can_assign_roleperm')->name('addperm');
                Route::get('user/{user}/role',[UserController::class,'assignrole'])->middleware('permission:can_assign_roleperm')->name('assignrole');
                Route::post('setrole/{user}',[UserController::class,'setrole'])->middleware('permission:can_assign_roleperm')->name('setrole');
                Route::post('storeperm/{role}',[RolesController::class,'storeperm'])->middleware('permission:can_assign_roleperm')->name('storeperm');
        });
