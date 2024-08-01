<?php

namespace App\Console\Commands;

use App\Enums\AbilityEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateAbility extends Command
{
    protected $signature = 'generate:ability';

    protected $description = 'Trans Ability.php Permissions To JS';

    public function handle()
    {
        $permissions = collect(AbilityEnum::cases())->pluck('value', 'name');

        $data = 'export const Ability = ' . json_encode($permissions);

        $path = resource_path('js/Classes/Ability.js');
        File::ensureDirectoryExists(resource_path("js/Classes"));
        if (!file_exists($path)) {
            touch($path);
        }

        file_put_contents($path, $data);

        $this->info('Success Copy Ability To JS !');
    }
}
