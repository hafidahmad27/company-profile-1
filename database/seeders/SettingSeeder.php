<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create([
            'site_name' => 'HFD Corp',
            'logo' => fake()->imageUrl(200, 200, 'business', true, 'logo'),
            'email' => 'hfdofficial@test.com',
            'phone' => '083854520264',
            'address' => fake()->address(),
            'footer_text' => '© 2026 HFD Corp. All rights reserved.',
            'user_id' => 1,
        ]);
    }
}
