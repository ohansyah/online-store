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
            'Makanan' => ['Mie Goreng', 'Wafer Cokelat', 'Biskuit', 'Sereal', 'Permen', 'Cokelat Batangan'],
            'Minuman' => ['Air Mineral', 'Teh Botol', 'Kopi Sachet', 'Susu UHT', 'Minuman Isotonik'],
            'Alat Tulis' => ['Pulpen', 'Pensil', 'Buku Tulis', 'Penghapus', 'Rautan', 'Penggaris'],
            'Pakaian' => ['Kaos', 'Celana Pendek', 'Kemeja', 'Jaket', 'Kaos Kaki'],
            'Mainan' => ['Mobil-Mobilan', 'Boneka', 'Pistol Air', 'Balok Susun', 'Gasing'],
            'Furniture' => ['Meja Lipat', 'Kursi Plastik', 'Rak Serbaguna', 'Lemari Mini'],
            'Bumbu Dapur' => ['Garam', 'Gula Pasir', 'Kecap Manis', 'Saus Sambal', 'Kaldu Bubuk'],
            'Lainnya' => ['Tissue Basah', 'Minyak Kayu Putih', 'Obat Nyamuk', 'Sabun Cuci Tangan'],
        ];

        // pick random category and product name
        $categoryName = $this->faker->randomElement(array_keys($categories));
        $categoryId = $categories[$categoryName];
        $productName = $this->faker->randomElement($productsByCategory[$categoryName]);

        return [
            'name' => $productName,
            'sku' => $this->faker->unique()->numerify('SKU-'.$categoryId.'####'),
            'barcode' => $this->faker->unique()->randomNumber(8),
            'description' => $this->faker->realText(200),  // More realistic description length
            'price' => $this->faker->randomNumber(2) * 100,
            'image' => 'products/box.png',
            'is_active' => $this->faker->boolean(80),  // 80% chance of being active
            'category_id' => $categoryId,
        ];
    }
}
