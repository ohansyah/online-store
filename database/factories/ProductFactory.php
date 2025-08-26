<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $categories = null;
        if (is_null($categories)) {
            // Get ['Makanan' => 1, 'Minuman' => 2, ...]
            $categories = Category::pluck('id', 'name')->toArray();
        }

        $productsByCategory = [
            'Kursi' => [
                'Kursi Kartini',
                'Kursi Minerva',
                'Kursi Goyang Koin',
                'Kursi Betawi Jati',
                'Kursi Bale-Bale',
            ],
            'Meja' => [
                'Meja Kopi Oval Marmer',
                'Meja Belajar Laci 3',
                'Meja Rias Cermin Bulat',
                'Meja Sudut Kaki Cabriole',
                'Meja Konsul Marmer Inlay',
            ],
            'Pintu' => [
                'Pintu Gebyok 3 Meter',
                'Pintu Gebyok Limasan',
                'Pintu Gebyok Gebyrah',
                'Pintu Panel 6 Kotak',
                'Pintu Sliding Jati',
            ],
            'Lemari' => [
                'Lemari Pakaian 4 Pintu',
                'Lemari Hias Kaca Lengkung',
                'Lemari Pajangan Kaligrafi',
                'Lemari Sudut Jati',
                'Lemari French Louis',
            ],
            'Tempat Tidur' => [
                'Tempat Tidur Rahwana',
                'Tempat Tidur Maharaja',
                'Tempat Tidur Kanopi',
                'Tempat Tidur Anak Tingkat',
                'Tempat Tidur Dipan Laci',
            ],
            'Dapur' => [
                'Bufet Pendek Mawar',
                'Bufet Panjang Kalimantan',
                'Rak Piring Gantung',
                'Kitchen Set Minimalis Jati',
                'Bangku Bar Silinder',
            ],
            'Lainnya' => [
                'Wrist Rest Mindi',
                'Wrist Rest Jati',
            ],
        ];

        $productImages = [
            "Kursi"=> "default/products/chair.webp",
            "Meja"=> "default/products/table.webp",
            "Pintu"=> "default/products/door.webp",
            "Lemari"=> "default/products/wardrobe.webp",
            "Tempat Tidur"=> "default/products/bed-frame.webp",
            "Dapur"=> "default/products/kitchen-set.webp",
            "Lainnya"=> "default/products/wrist-rest.webp",
        ];

        // pick random category and product name
        $categoryName = $this->faker->randomElement(array_keys($categories));
        $categoryId = $categories[$categoryName];
        $productName = $this->faker->randomElement($productsByCategory[$categoryName]);
        if (isset($productImages[$categoryName])) {
            $imagePath = $productImages[$categoryName];
        } else {
            $imagePath = 'default/products/lamp.png'; // default image
        }

        return [
            'name' => $productName,
            'sku' => $this->faker->unique()->numerify('SKU-'.$categoryId.'####'),
            'barcode' => $this->faker->unique()->randomNumber(8),
            'description' => $this->faker->realText(200),  // More realistic description length
            'price' => $this->faker->randomNumber(2) * 100,
            'image' => $imagePath,
            'is_active' => $this->faker->boolean(80),  // 80% chance of being active
            'category_id' => $categoryId,
        ];
    }
}
