<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use App\Services\LoadDataService;
use Inertia\Inertia;

class RankingCpsAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/CPs', [

            'tableData' => collect(LoadDataService::make()->loadData())
                ->sortByDesc('ConquerPoints')
                ->values()
                ->map(function ($data, $index) {
                    return [
                         ...$data,
                        'ConquerPoints' => number_format($data['ConquerPoints']),
                        'Rank' => LoadDataService::make()->getRank(
                            rank: $index + 1,
                            body: $data['Body'],
                        ),
                    ];
                })
                ->paginate(10),

        ]);
    }
}
