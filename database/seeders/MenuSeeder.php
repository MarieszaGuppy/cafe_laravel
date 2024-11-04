<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $menus = [
      [
        'name' => 'Lavender Tea',
        'image' => 'hsbcsj34JSBC53JCsbcmjs8scsJcsbksn.png',
        'category_id' => 1,
        'description' => 'Rasa lavender yang unik serta menghangatkan. Wanginya yang harum dan segar.',
        'price' => '23000',
        'stock' => '30',
        'slug' => 'lavender-tea',
      ],
      [
        'name' => 'Lemon Tea',
        'image' => 'hscbjsnm4MH3H5Jscnsjbc35FJcbsjkNS.png',
        'category_id' => 2,
        'description' => 'Rasa lemon yang menyegarkan dan menaikkan mood.',
        'price' => '25000',
        'stock' => '30',
        'slug' => 'lemon-tea',
      ],
      [
        'name' => 'Chamomile Tea',
        'image' => '6Mscnsj563mcajjssvjsvksnHSC873jk.png',
        'category_id' => 1,
        'description' => 'Rasa teh chamomile yang unik membuatnya populer. Harum tehnya segar.',
        'price' => '26000',
        'stock' => '30',
        'slug' => 'chamomile-tea',
      ],
    ];

    foreach ($menus as $key => $menu) {
      Menu::create($menu);
    }
  }
}
