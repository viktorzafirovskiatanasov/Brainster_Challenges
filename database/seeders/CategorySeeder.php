<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'general',
        ]);
        Category::create([
            'title' => 'entertainment',
        ]);
        Category::create([
            'title' => 'sports',
        ]);
        Category::create([
            'title' => 'movies',
        ]);
        Category::create([
            'title' => 'politics',
        ]);
        Category::create([
            'title' => 'cars',
        ]);
    }
}
