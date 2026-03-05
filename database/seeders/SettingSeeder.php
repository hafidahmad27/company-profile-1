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
            'logo' => 'logo.png',
            'address' => fake()->address(),
            'phone' => '012345678910',
            'email' => 'hfdofficial1@gmail.com',
            'footer_about' => 'HFD Corp is a lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla vitae ad sit, tempora accusamus accusantium necessitatibus dignissimos libero adipisci quo.',
            'footer_text' => '© 2026 HFD Corp. All rights reserved.',
            'user_id' => 1,
        ]);
    }
}
