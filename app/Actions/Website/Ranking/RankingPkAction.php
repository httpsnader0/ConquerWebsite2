<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use Inertia\Inertia;

class RankingPkAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/PK', [

            'tableData' => [],

        ]);
    }
}
