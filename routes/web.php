<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\AdminController;
use \App\Http\Controllers\admin\ClothesController;
use \App\Http\Controllers\admin\dashboardController;
use \App\Http\Controllers\admin\UserController;
use \App\Http\Controllers\admin\CategoryController;
use \App\Http\Controllers\frontsideController;

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
Route::prefix('admin')->middleware('auth:webadmin')->group(function () {

    Route::get('/', [dashboardController::class, 'showhome'])->name('dashboard');
    Route::resource('/clothes', ClothesController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/admin/{id}/change', [AdminController::class, 'change'])->name('admin.change');
    Route::put('/admin/{id}/change/do_change', [AdminController::class, 'do_change'])->name('admin.do_change');

});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');

Route::get('/', [frontsideController::class, 'showhome'])->middleware('auth:web');

Route::prefix('user')->middleware('auth:web')->group(function () {
Route::get('/', [frontsideController::class, 'showhome'])->name('home');
Route::get('/clothes', [frontsideController::class, 'showclothes'])->name('clothes');
    Route::get('/catedory', [frontsideController::class, 'showcatedory'])->name('categories');

    Route::get('/catedory/{id}', [frontsideController::class, 'showcatclothes'])->name('catclothes');
    Route::get('/clothes/{id}', [frontsideController::class, 'showdetail'])->name('detail');

    Route::get('/about', [frontsideController::class, 'showabout'])->name('about');
    Route::get('/contact', [frontsideController::class, 'showcontact'])->name('contact');
    Route::post('/search', [frontsideController::class, 'search'])->name('search');


});
Route::post('/signin', [frontsideController::class, 'signin'])->name('signin');
Route::get('/pre_index', [frontsideController::class, 'pre_index'])->name('pre_index');

