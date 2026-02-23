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
            'logo' => 'storage/logo.png',
            'address' => fake()->address(),
            'phone' => '012345678910',
            'email' => 'hfdcorp@test.com',
            'footer_text' => '© 2026 HFD Corp. All rights reserved.',
            'user_id' => 1,
        ]);
    }
}
