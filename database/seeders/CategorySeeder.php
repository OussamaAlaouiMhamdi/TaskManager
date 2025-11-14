<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Work',
                'description' => 'Tasks related to work projects',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Personal',
                'description' => 'Personal tasks and reminders',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urgent',
                'description' => 'High priority tasks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
