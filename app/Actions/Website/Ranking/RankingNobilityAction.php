<?php

namespace App\Actions\Website\Ranking;

use App\Actions\Action;
use App\Services\LoadDataService;
use Inertia\Inertia;

class RankingNobilityAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Ranking/Nobility', [

            'tableData' => collect(LoadDataService::make()->loadData())
                ->sortByDesc('DonationNobility')
                ->values()
                ->map(function ($data, $index) {
                    return [
                         ...$data,
                        'DonationNobility' => number_format($data['DonationNobility']),
                        'Rank' => LoadDataService::make()->getRank(
                            rank: $index + 1,
                            body: $data['Body'],
                            type: 'nobility',
                        ),
                    ];
                })
                ->take(50)
                ->paginate(10),

        ]);
    }
}
