<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'image' => 'hscdbh7XSHXB834Xshbsc7.jpg',
            'author_id' => 1,
            'category_id' => 3,
            'description' => 'Ayo coba Strawberry Tart yang segar ini!',
            'slug' => 'strawberry-tart-segar'
        ]);
    }
}
