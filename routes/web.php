<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
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
Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('home', [Controller::class, 'home'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['web', 'auth', 'verified', 'admin'])->group(function () {
    Route::get('/create-team', [TeamController::class, 'showCreateForm'])->name('create_team');
    Route::post('/store-team', [TeamController::class, 'storeTeam'])->name('store_team');
    Route::get('/edit-team/{team}', [TeamController::class, 'showEditForm'])->name('edit_team');
    Route::patch('/update-team/{team}', [TeamController::class, 'updateTeam'])->name('update_team');
    Route::delete('/delete-team/{team}', [TeamController::class, 'markAsNotAvailable'])->name('delete_team');

    Route::get('/create-player', [PlayerController::class, 'showCreateForm'])->name('create_player');
    Route::post('/store-player', [PlayerController::class, 'storePlayer'])->name('store_player');

    Route::get('/create-match', [FootballMatchController::class, 'showCreateForm'])->name('create_match');
    Route::post('/store-match', [FootballMatchController::class, 'storeMatch'])->name('store_match');
    Route::get('/edit-match/{match}', [FootballMatchController::class, 'showEditForm'])->name('edit_match');
    Route::patch('/update-match/{match}', [FootballMatchController::class, 'updateMatch'])->name('update_match');
    Route::delete('/delete-match/{match}', [FootballMatchController::class, 'markAsCompleted'])->name('delete_match');

    Route::get('/all-teams', [TeamController::class, 'showAllTeams'])->name('all_teams');
    Route::get('/all-players', [PlayerController::class, 'allPlayers'])->name('all_players');
});

Route::get('/all-matches', [FootballMatchController::class, 'scheduledMatches'])->name('all_matches');


require __DIR__.'/auth.php';
