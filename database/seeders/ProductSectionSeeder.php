<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductSection;
use App\Models\Product;

class ProductSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        $sections = ['popular','discount'];
        foreach ($sections as $section) {
            $productIds = Product::inRandomOrder()->take(10)->pluck('id')->toArray();
            $bulkData = [];
            foreach ($productIds as $productId) {
                $bulkData[] = [
                    'product_id' => $productId,
                    'section_name' => $section,
                    'created_at' => $createdAt,
                ];
            }
            ProductSection::insert($bulkData);
        }
    }
}
