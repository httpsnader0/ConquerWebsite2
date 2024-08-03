<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Blog::create([
                'name' => [
                    'ar' => 'Blog ' . $i,
                    'en' => 'Blog ' . $i,
                ],
                'content' => [
                    'ar' => 'Soon <b>Blog ' . $i . '</b>',
                    'en' => 'Soon <b>Blog ' . $i . '</b>',
                ],
            ]);
        }
    }
}
