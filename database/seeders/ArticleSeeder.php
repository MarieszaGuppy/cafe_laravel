<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Mari Membuat Teh Tarik',
            'image' => 'fceddad48108da534fc2e2ff128e8322.jpg',
            'author_id' => 1,
            'category_id' => 1,
            'body' => 'Teh Tarik, rasa tehnya yang manis dan lembut. Menghangatkan diri dari cuaca yang dingin. Membuatmu menjadi bahagia dan menenangkan pikiran. 


Berikut langkah-langkahnya, 

1. Pertama, seduh teh dengan air panas mendidih hingga kental dan hitam. 

2. Kedua, tambahkan susu evaporasi dan kental manis ke dalam teh yang sudah dimasak, aduk rata.

3. Ketiga, siapkan satu gelas bergagang bukan dari bahan beling. Tuangkan campuran teh susu ke dalam gelas tersebut. 

4. Keempat, tuang cairan dan tarik gelas campuran teh susu ke gelas tinggi tersebut. Ulangi berkali-kali sampai teh berbusa.

5. Kelima, Sajikan teh dalam kondisi hangat',
            'slug' => 'mari-membuat-teh-tarik',
        ]);
    }
}
