<?php

use App\Http\Controllers\NavBarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 
Route::get('/home', [NavBarController::class, 'home'])->name('home');
Route::get('/about', [NavBarController::class, 'about'])->name('about');
Route::get('/contact', [NavBarController::class, 'contact'])->name('contact');
Route::get('/post', [NavBarController::class, 'post'])->name('post');

