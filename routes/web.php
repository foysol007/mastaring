<?php

use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\UserController as BackendUserController;
use App\Http\Controllers\Forntend\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
Route::get('/',[\App\Http\Controllers\Forntend\HomeController::class,'index'])->name('home');

Route::get('login',[\App\Http\Controllers\backend\LoginController::class,'login'])->name('login');
Route::post('login',[\App\Http\Controllers\backend\LoginController::class,'dologin']);

Route::get('register',[\App\Http\Controllers\Forntend\UserController::class,'register'])->name('register');
Route::post('register',[\App\Http\Controllers\Forntend\UserController::class,'doRegister']);

Route::get('add/cart/{id}',[\App\Http\Controllers\Forntend\CartController::class,'cart'])->name('add.cart');
Route::get('cart',[\App\Http\Controllers\Forntend\CartController::class,'show'])->name('cart');







Route::middleware('auth')->group(function(){

    // Profile
        Route::get('profile',[\App\Http\Controllers\Forntend\UserController::class,'profile'])->name('user.profile');
        Route::post('profile',[\App\Http\Controllers\Forntend\UserController::class,'updateProfile']);



        Route::get('logout',[\App\Http\Controllers\backend\LoginController::class,'logout'])->name('logout');

Route::prefix('dashbord')->group(function(){

    Route::middleware('IsAdmin')->group(function(){

        Route::get('/',[\App\Http\Controllers\backend\DashboardController::class,'index'])->name('admin.dashbord');
        Route::get('profile',[\App\Http\Controllers\backend\LoginController::class,'profile'])->name('profile');
        Route::get('/products',[\App\Http\Controllers\backend\ProductCntroller::class,'index'])->name('admin.product');
        Route::get('/products/create',[\App\Http\Controllers\backend\ProductCntroller::class,'create'])->name('admin.product.create');
        Route::post('/products/create',[\App\Http\Controllers\backend\ProductCntroller::class,'store']);
        Route::get('/products/edit/{id}',[\App\Http\Controllers\backend\ProductCntroller::class,'edit'])->name('admin.product.edit');
        Route::post('/products/edit/{id}',[\App\Http\Controllers\backend\ProductCntroller::class,'update']);
        Route::get('/products/delete/{id}',[\App\Http\Controllers\backend\ProductCntroller::class,'delete'])->name('admin.product.delete');
        Route::get('users',[\App\Http\Controllers\backend\UserController::class,'index'])->name('admin.user');
        Route::get('users/create',[\App\Http\Controllers\backend\UserController::class,'create'])->name('admin.user.create');
        Route::post('users/create',[\App\Http\Controllers\backend\UserController::class,'store']);
        });

    });

});
