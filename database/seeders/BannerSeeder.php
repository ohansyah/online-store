<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        Banner::insert([
            [
                'name' => 'Summer Sale',
                'description' => 'Get ready for summer with our exclusive furniture sale! Up to 50% off on selected items. Limited time offer!',
                'started_at' => now()->subDays(1),
                'ended_at' => now()->addDays(10),
                'image' => 'default/banners/banner-1.webp',
                'is_active' => true,
                'created_at' => $createdAt,
            ],
            [
                'name' => 'New Arrivals',
                'description' => 'Discover our latest collection of modern furniture. Fresh styles and designs to elevate your home decor.',
                'started_at' => now()->subDays(2),
                'ended_at' => now()->addDays(20),
                'image' => 'default/banners/banner-1.webp',
                'is_active' => true,
                'created_at' => $createdAt,
            ],
            [
                'name' => 'Clearance Sale',
                'description' => 'Huge clearance sale on all furniture items! Don\'t miss out on these unbeatable prices. While stocks last!',
                'started_at' => now()->subDays(3),
                'ended_at' => now()->addDays(30),
                'image' => 'default/banners/banner-1.webp',
                'is_active' => true,
                'created_at' => $createdAt,
            ],
        ]);
    }
}
