<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\ExportArray\RoleExportArray;
use App\Http\Resources\Dashboard\RoleResource;
use Inertia\Inertia;
use Silber\Bouncer\Database\Role;

class RoleIndexAction extends Action
{
    public $ability = AbilityEnum::ROLES_INDEX;

    public function handle()
    {
        $data = Role::query()
            ->where('id', '!=', 1)
            ->when(request('search'), function ($query, $value) {
                $query->where('name', 'LIKE', '%' . $value . '%');
            })
            ->with(['abilities'])
            ->orderByDesc('id');

        if ($this->whenExport()) {
            return $this->handleExport($data, (new RoleExportArray)->toArray());
        }

        return Inertia::render('Dashboard/Role/Index', [

            'tableData' => RoleResource::collection($data->paginate())->resource,

        ]);
    }
}
