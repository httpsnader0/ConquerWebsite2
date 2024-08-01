<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mohamed Nader',
            'email' => 'httpsnader@gmail.com',
            'password' => 123,
        ]);
    }
}
