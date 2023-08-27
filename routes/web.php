<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin login routes
Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',  [App\Http\Controllers\AdminAuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Shorten URL Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/shorten', [App\Http\Controllers\ShortenedUrlController::class, 'shortenUrl'])->name('shorten.url');
});

Route::get('/{shortenedUrl}',  [App\Http\Controllers\ShortenedUrlController::class, 'redirectToOriginalUrl'])->name('redirect.to.original');

