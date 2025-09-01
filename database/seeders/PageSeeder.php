<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        Page::insert([
            [
                'title' => 'Info',
                'content' => 'Welcome to our online store! We offer a wide range of high-quality furniture to suit your style and needs. Our collection includes modern, contemporary, and classic designs, all crafted with care and attention to detail. Whether you\'re looking for a new sofa, dining table, or bedroom set, we have something for everyone. Enjoy a seamless shopping experience with secure payment options and reliable delivery services. Thank you for choosing us for your furniture needs!',
                'created_at' => $createdAt,
            ], [
                'title' => 'Delivery',
                'content' => 'We offer fast and reliable delivery services to ensure your furniture arrives safely and on time. Our delivery team is trained to handle your items with care, and we provide tracking information so you can monitor your order every step of the way. Delivery times may vary based on your location and the items ordered, but we strive to deliver within 5-7 business days. For larger items, we may require a scheduled delivery appointment to ensure a smooth process. Please note that delivery fees may apply based on the size and weight of your order. Thank you for shopping with us!',
                'created_at' => $createdAt,
            ],
        ]);
    }
}
