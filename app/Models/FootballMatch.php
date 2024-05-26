<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;


    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'result',
        'match_date',
        'is_deleted',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'footballmatch_teams');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'footballmatch_players');
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }
}
