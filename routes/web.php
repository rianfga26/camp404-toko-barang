<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;

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


// Guest 
Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::get('about', [GuestController::class, 'about'])->name('about');

// Admin
Route::resource('product', ProductController::class)->middleware('auth');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Auth::routes();

