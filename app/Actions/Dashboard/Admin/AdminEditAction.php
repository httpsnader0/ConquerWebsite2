<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Arrayable\Dashboard\AdminArray;
use App\Enums\AbilityEnum;
use App\Models\User;
use Inertia\Inertia;

class AdminEditAction extends Action
{
    public $ability = AbilityEnum::ADMINS_UPDATE;

    public function handle(User $admin)
    {
        abort_if($admin->email == env('SUPER_ADMIN'), 403);

        $arrayable = new AdminArray($admin);

        return Inertia::render('Dashboard/Admin/Form', $arrayable);
    }
}
