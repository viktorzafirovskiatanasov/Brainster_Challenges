<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\FootballMatch;
use Illuminate\Support\Facades\Log;

class FootballMatchController extends Controller
{
    public function scheduledMatches()
    {
        $matches = FootballMatch::with(['team1', 'team2'])
            ->where('is_deleted', 'false')
            ->get();

        return view('matches', compact('matches'));
    }

    public function showCreateForm()
    {
        $teams = Team::all();
        return view('create_new_match', compact('teams'));
    }

    public function storeMatch(Request $request)
    {

        $request->validate([
            'team_1_id' => 'required|exists:teams,id',
            'team_2_id' => 'required|exists:teams,id|different:team_1_id',
            'result' => 'nullable|string|max:255',
            'match_date' => 'required',
        ]);

        $playersTeam1 = Player::where('team_id', $request->team_id_1)->get();
        $playersTeam2 = Player::where('team_id', $request->team_2_id)->get();

        $footballMatch = FootballMatch::create([
            'team_1_id' => $request->team_1_id,
            'team_2_id' => $request->team_2_id,
            'result' => $request->result,
            'match_date' => $request->match_date,
            'is_deleted' => false,
        ]);

        $footballMatch->players()->attach($playersTeam1);
        $footballMatch->players()->attach($playersTeam2);

        return redirect()->route('all_matches');
    }

    public function showEditForm(FootballMatch $match)
    {
        $teams = Team::all();

        return view('edit_match', compact('match', 'teams'));
    }
    public function updateMatch(Request $request, FootballMatch $match)
{
    $request->validate([
        'team_1_id' => 'required|exists:teams,id',
        'team_2_id' => 'required|exists:teams,id|different:team_1_id',
        'result' => 'nullable|string|max:255',
        'match_date' => 'required',
    ]);

    $match->update([
        'team_1_id' => $request->team_1_id,
        'team_2_id' => $request->team_2_id,
        'result' => $request->result,
        'match_date' => $request->match_date,
    ]);

    return redirect()->route('all_matches')->with('success', 'Match updated successfully');
}
    
    public function markAsCompleted(FootballMatch $match)
    {
        if ($match->is_deleted === true) {
            return redirect()->route('matches')->with('error', 'Match is already marked as not available.');
        }

        $match->update(['is_deleted' => true]);

        return redirect()->route('all_matches');
    }
}
