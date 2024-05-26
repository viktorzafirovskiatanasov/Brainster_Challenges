<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ComentsController;

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
Route::get('/' ,[ChallengeController::class, 'home'] );
Route::get('home', [ChallengeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
Route::post('/discussions/store', [DiscussionController::class, 'store'])->name('discussions.store');

Route::get('dashboard', [DiscussionController::class, 'approved'])->name('dashboard');

Route::get('/single/{id}', [DiscussionController::class, 'single'])->name('single');

Route::get('/discussions/{discussion}/comment/create', [ComentsController::class, 'create'])->name('discussions.comment.create');
Route::post('/discussions/{discussion}/comment/store', [ComentsController::class, 'store'])->name('discussions.comment.store');

Route::put('/discussions/approve/{id}', [DiscussionController::class, 'approve'])->name('discussions.approve');
Route::put('/discussions/denied/{id}', [DiscussionController::class, 'denied'])->name('discussions.denied');
Route::get('discussions/{discussion}/edit', [DiscussionController::class, 'edit'])->name('discussions.edit');
Route::put('discussions/{discussion}', [DiscussionController::class, 'update'])->name('discussions.update');


Route::get('comments/{comment}/edit', [ComentsController::class, 'edit'])->name('comments.edit');
Route::patch('comments/{comment}', [ComentsController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [ComentsController::class, 'destroy'])->name('comments.destroy');

require __DIR__ . '/auth.php';
