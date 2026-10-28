<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->create([
            // 'name' => 'HFD Corp',
            // 'logo' => null,
            // 'address' => fake()->address(),
            // 'map_embed' => null,
            // 'headline' => 'HFD Corp is a lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla vitae ad sit, tempora accusamus accusantium necessitatibus dignissimos libero adipisci quo.',
            // 'email' => 'hfdcorp@example.com',
            // 'phone' => '031234567891',
            // 'whatsapp' => '081234567891',
            // 'instagram' => 'https://www.instagram.com/xxx',
            // 'tiktok' => 'https://www.tiktok.com/@xxx',
            // 'youtube' => 'https://www.youtube.com/@xxx',
            // 'facebook' => 'https://www.facebook.com/xxx',
            // 'linkedin' => 'https://www.linkedin.com/xxx',
            'user_id' => 1,
        ]);
    }
}
