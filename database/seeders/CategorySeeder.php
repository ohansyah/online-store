<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        Category::insert([
            [
                'name' => 'Makanan',
                'created_at' => $createdAt,
                'image' => 'categories/makanan.png',
            ],
            [
                'name' => 'Minuman',
                'created_at' => $createdAt,
                'image' => 'categories/minuman.png',
            ],
            [
                'name' => 'Alat Tulis',
                'created_at' => $createdAt,
                'image' => 'categories/alat-tulis.png',
            ],
            [
                'name' => 'Pakaian',
                'created_at' => $createdAt,
                'image' => 'categories/pakaian.png',
            ],
            [
                'name' => 'Mainan',
                'created_at' => $createdAt,
                'image' => 'categories/mainan.png',
            ],
            [
                'name' => 'Furniture',
                'created_at' => $createdAt,
                'image' => 'categories/furniture.png',
            ],
            [
                'name' => 'Bumbu Dapur',
                'created_at' => $createdAt,
                'image' => 'categories/bumbu.png',
            ],
            [
                'name' => 'Lainnya',
                'created_at' => $createdAt,
                'image' => 'categories/lainnya.png',
            ],
        ]);
    }
}
