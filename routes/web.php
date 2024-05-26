<?php


use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

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

Route::get('/', [MainController::class , 'homepage'])->name('homepage');
Route::get('/login', [MainController::class , 'login'])->name('login');
Route::get('/logout', [MainController::class , 'logout'])->name('logout');
Route::get('/adminPanel', [MainController::class , 'adminPanel'])->name('adminPanel');
Route::post('/validateLogin', [MainController::class , 'validateLogin'])->name('validateLogin');
Route::post('/addProject', [MainController::class , 'addProject'])->name('addProject');
Route::delete('/delete-project/{id}', [MainController::class, 'deleteProject'])->name('deleteProject');
Route::put('/edit-project/{id}', [MainController::class, 'editProject'])->name('editProject');
Route::post('/employment', [MainController::class , 'employment'])->name('employment');
