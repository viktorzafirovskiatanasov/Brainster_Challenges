<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FootballMatch;

class AddRandomResults extends Command
{
    protected $signature = 'add:random-results';
    protected $description = 'Add random results for matches played in the last 24 hours';

    public function handle()
    {
        $matches = FootballMatch::whereBetween('match_date', [now()->subDay(), now()])->get();

        foreach ($matches as $match) {
            $result = rand(0, 5) . '-' . rand(0, 5);

            $match->update(['result' => $result]);
        }

        $this->info('Random results added successfully.');
    }
}
