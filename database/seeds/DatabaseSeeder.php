<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Мобильные телефоны',
                'code' => 'mobiles',
                'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
                'image' => 'categories/mobile.jpg',
                'products' => [
                    [
                        'name' => 'iPhone X',
                        'code' => 'iphone_x',
                        'description' => 'Отличный продвинутый телефон',
                        'image' => 'products/iphone_x.jpg',    
                    ],
                    [
                        'name' => 'iPhone XL',
                        'code' => 'iphone_xl',
                        'description' => 'Огромный продвинутый телефон',

                        'image' => 'products/iphone_x_silver.jpg',
                        
                    ],
                    [
                        'name' => 'HTC One S',
                        'code' => 'htc_one_s',
                        'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                        'image' => 'products/htc_one_s.png',
                    
                    ],
                    [
                        'name' => 'iPhone 5SE',
                        'code' => 'iphone_5se',
                        'description' => 'Отличный классический iPhone',
                        'image' => 'products/iphone_5.jpg',
                        
                    ],
                    [
                        'name' => 'Samsung Galaxy J6',
                        'code' => 'samsung_j6',
                        'description' => 'Современный телефон начального уровня',
                        'image' => 'products/samsung_j6.jpg',
                        
                    ],
                ]
            ],
            [
                'name' => 'Портативная техника',
                'code' => 'portable',
                'description' => 'Раздел с портативной техникой.',
                'image' => 'categories/portable.jpg',
                'products' => [
                    [
                        'name' => 'Наушники Beats Audio',
                        'code' => 'beats_audio',
                        'description' => 'Отличный звук от Dr. Dre',
                        'image' => 'products/beats.jpg',

                    ],
                    [
                        'name' => 'Камера GoPro',
                        'code' => 'gopro',
                        'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                        'image' => 'products/gopro.jpg',
                    ],
                    [
                        'name' => 'Камера Panasonic HC-V770',
                        'code' => 'panasonic_hc-v770',
                        'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                        'image' => 'products/video_panasonic.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Бытовая техника',
                'code' => 'appliances',
                'description' => 'Раздел с бытовой техникой',
                'image' => 'categories/appliance.jpg',
                'products' => [
                    [
                        'name' => 'Кофемашина DeLongi',
                        'code' => 'delongi',
                        'description' => 'Хорошее утро начинается с хорошего кофе!',
                        'image' => 'products/delongi.jpg',
                        
                    ],
                    [
                        'name' => 'Холодильник Haier',
                        'code' => 'haier',
                        'description' => 'Для большой семьи большой холодильник!',
                        'image' => 'products/haier.jpg',
                        
                    ],
                    [
                        'name' => 'Блендер Moulinex',
                        'code' => 'moulinex',
                        'description' => 'Для самых смелых идей',
                        'image' => 'products/moulinex.jpg',

                    ],
                    [
                        'name' => 'Мясорубка Bosch',
                        'code' => 'bosch',
                        'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                        'image' => 'products/bosch.jpg',
                    ],
                ],
            ]
        ];

        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            $products = $category['products'];
            unset($category['products']);
            $categoryId = DB::table('categories')->insertGetId($category);

            foreach ($products as $product) {
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();
                $product['hit'] = !boolval(rand(0, 3));
                $product['recommend'] = rand(0, 1);
                $product['new'] = rand(0, 1);
                $product['category_id'] = $categoryId;
                $product['count'] = rand(1, 100);
                $product['price'] = rand(5000, 100000);

                DB::table('products')->insert($product);


                    
                
            }
        }
    }
}