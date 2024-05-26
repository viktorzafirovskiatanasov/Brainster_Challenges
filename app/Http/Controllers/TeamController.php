<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\FootballMatch;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function showAllTeams()
    {
        $teams = Team::where('is_deleted', 'available')->get();
        return view('teams', compact('teams'));
    }

    public function showCreateForm()
    {
        return view('create_new_team');
    }

    public function storeTeam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|string|max:255',
            'year_founded' => 'required',
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
          
        Team::create([
            'name' => $request->team_name,
            'year_founded' => $request->year_founded,
            'is_deleted' => false,
        ]);

        return redirect()->route('all_teams');
    }

    public function showEditForm(Team $team)
    {
        return view('edit_team', compact('team'));
    }

    public function updateTeam(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year_founded' => 'required', 
        ]);

        $team->update([
            'name' => $request->name,
            'year_founded' => $request->year_founded,
        ]);

        return redirect()->route('all_teams');
    }

    public function markAsNotAvailable(Team $team)
    {
        if ($team->is_deleted === true) {
            return redirect()->route('all_teams');
        }

        $team->update(['is_deleted' => true]);

        return redirect()->route('all_teams');
    }
}
