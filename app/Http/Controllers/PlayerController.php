<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function allPlayers()
    {
        $players = Player::with('team')->get();
        return view('players', compact('players'));
    }
    
    public function showCreateForm()
    {
        $teams = Team::all();
        return view('create_new_player', compact('teams'));
    }

    public function storePlayer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'team_id' => 'required|exists:teams,id',
        ]);

         Player::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'date_of_birth' => $request->date,
            'team_id' => $request->team_id,
        ]);

        return redirect()->route('all_players');
    }
}
