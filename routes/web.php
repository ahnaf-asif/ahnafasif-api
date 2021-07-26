<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
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

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    
    Route::resource('blog', 'App\Http\Controllers\BlogController');
    Route::get('blog/archive/{id}/{type}', [BlogController::class, 'archive'])->name('archive');
    
    Route::get('/contact/read/{id}', [HomeController::class, 'read'])->name('read.contact');

    Route::resource('portfolio', 'App\Http\Controllers\PortfolioController');
    Route::get('portfolio/archive/{id}/{type}', [PortfolioController::class, 'archive'])->name('portfolio.archive');
});



