<?php

namespace App\Actions\Website\Ranking;

use Inertia\Inertia;
use App\Actions\Action;
use App\Services\LoadDataService;

class RankingPkAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/PK', [

            'tableData' => collect(LoadDataService::make()->loadData())
                ->sortByDesc('PkPoints')
                ->values()
                ->map(function ($data, $index) {
                    return [
                         ...$data,
                        'PkPoints' => number_format($data['PkPoints']),
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
