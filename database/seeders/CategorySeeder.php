<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Source : 
     *  https://www.flaticon.com/authors/monkik
     *  https://www.flaticon.com/authors/payungkead
     *  https://www.flaticon.com/authors/nikita-golubev
     */
    public function run(): void
    {
        $createdAt = now();
        Category::insert([
            [
                'name' => 'Kursi',
                'created_at' => $createdAt,
                'image' => 'default/categories/chair.png',
            ],
            [
                'name' => 'Meja',
                'created_at' => $createdAt,
                'image' => 'default/categories/table.png',
            ],
            [
                'name' => 'Pintu',
                'created_at' => $createdAt,
                'image' => 'default/categories/door.png',
            ],
            [
                'name' => 'Lemari',
                'created_at' => $createdAt,
                'image' => 'default/categories/wardrobe.png',
            ],
            [
                'name' => 'Tempat Tidur',
                'created_at' => $createdAt,
                'image' => 'default/categories/bed.png',
            ],
            [
                'name' => 'Dapur',
                'created_at' => $createdAt,
                'image' => 'default/categories/kitchen-set.png',
            ],
            [
                'name' => 'Lainnya',
                'created_at' => $createdAt,
                'image' => 'default/categories/furniture.png',
            ],
        ]);
    }
}
