<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        GeneralSetting::insert([
            [
                'key' => 'app_name',
                'value' => 'Laravel E-commerce',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ], [
                'key' => 'app_logo',
                'value' => 'logo.png',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ], [
                'key' => 'company_name',
                'value' => 'PT. Laravel E-commerce Indonesia',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ], [
                'key' => 'company_address_line_1',
                'value' => 'Jl. Raya No. 1',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ], [
                'key' => 'company_address_line_2',
                'value' => 'Kebayoran Baru, Jakarta Selatan',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]
        ]);
    }
}
