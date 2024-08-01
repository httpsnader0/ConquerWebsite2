<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use Inertia\Inertia;

class RankingIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/Index', [

            'totalAccounts' => rand(0, 1000),
            'totalCharacters' => rand(0, 1000),

            'totalTrojan' => rand(0, 1000),
            'totalWarrior' => rand(0, 1000),
            'totalArcher' => rand(0, 1000),
            'totalNinja' => rand(0, 1000),
            'totalMonk' => rand(0, 1000),
            'totalPirate' => rand(0, 1000),
            'totalDragonWarrior' => rand(0, 1000),
            'totalWaterTaoist' => rand(0, 1000),
            'totalFireTaoist' => rand(0, 1000),
            'totalWindwalker' => rand(0, 1000),

            'totalOnline' => rand(0, 1000),
            'totalOffline' => rand(0, 1000),

        ]);
    }
}
