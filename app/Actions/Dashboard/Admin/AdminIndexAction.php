<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\ExportArray\AdminExportArray;
use App\Http\Resources\Dashboard\AdminResource;
use App\Models\User;
use Inertia\Inertia;
use Silber\Bouncer\Database\Role;

class AdminIndexAction extends Action
{
    public $ability = AbilityEnum::ADMINS_INDEX;

    public function handle()
    {
        $data = User::query()
            ->where('email', '!=', 'httpsnader@gmail.com')
            ->search()
            ->filterIsActive()
            ->filterRole()
            ->orderByDesc('id');

        return Inertia::render('Dashboard/Admin/Index', [

            'tableData' => AdminResource::collection($data->paginate())->resource,

            'roleOptions' => $this->tableSelectBoxTransformer(Role::query()->where('id', '!=', 1), 'name', 'name'),

        ]);
    }
}
