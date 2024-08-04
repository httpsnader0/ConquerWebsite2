<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use App\Services\LoadDataService;
use Inertia\Inertia;

class RankingMoneyAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/Money', [

            'tableData' => collect(LoadDataService::make()->loadData())
                ->sortByDesc('Money')
                ->values()
                ->map(function ($data, $index) {
                    return [
                         ...$data,
                        'Money' => number_format($data['Money']),
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
