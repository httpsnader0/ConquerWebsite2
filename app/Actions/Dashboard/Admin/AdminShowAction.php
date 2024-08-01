<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Arrayable\Dashboard\AdminArray;
use App\Enums\AbilityEnum;
use App\Models\User;
use Inertia\Inertia;

class AdminShowAction extends Action
{
    public $ability = AbilityEnum::ADMINS_SHOW;

    public function handle(User $admin)
    {
        abort_if($admin->email == 'httpsnader@gmail.com', 403);

        $arrayable = new AdminArray($admin);

        return Inertia::render('Dashboard/Admin/Show', $arrayable);
    }
}
