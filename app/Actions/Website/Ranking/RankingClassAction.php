<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use App\Services\LoadDataService;
use Inertia\Inertia;

class RankingClassAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/Class', [

            'tableData' => collect(LoadDataService::make()->loadData())
                ->sortByDesc('VipLevel')
                ->values()
                ->map(function ($data, $index) {
                    return [
                         ...$data,
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
