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
            'name' => 'Minuman Hangat',
            'slug' => 'minuman-hangat',
        ]);
        Category::create([
            'name' => 'Minuman Dingin',
            'slug' => 'minuman-dingin',
        ]);
        Category::create([
            'name' => 'Makanan Ringan',
            'slug' => 'makanan-ringan',
        ]);
    }
}
