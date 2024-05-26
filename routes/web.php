<?php


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
    return view('dashboard');
})->name('dashboard');

Route::get('/vehicle/edit/{id}', function($id){
    return view('create_or_edit_vehicle', ['vehicleId' => $id]);
})->name('web_edit');

Route::get('/vehicle/create', function(){
    return view('create_or_edit_vehicle');
})->name('web_create');
