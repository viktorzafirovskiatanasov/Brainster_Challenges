<?php

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
Route::get('user', [UserController::class, 'index'])->name('user');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store')->middleware('web');
Route::get('user/show', [UserController::class, 'show'])->name('user.show');
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');

