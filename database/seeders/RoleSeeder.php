<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = BouncerFacade::role()->firstOrCreate([
            'name' => 'Administrator',
            'title' => 'Administrator',
        ]);
        BouncerFacade::allow('administrator')->everything();

        $admin = User::firstOrFail();
        $admin->roles()->sync($role);
    }
}
