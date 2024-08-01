<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Arrayable\Dashboard\AdminArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;

class AdminCreateAction extends Action
{
    public $ability = AbilityEnum::ADMINS_CREATE;

    public function handle()
    {
        $arrayable = new AdminArray();

        return Inertia::render('Dashboard/Admin/Form', $arrayable);
    }
}
