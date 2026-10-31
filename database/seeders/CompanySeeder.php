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
            // 'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.4913171512!2d106.66470007292722!3d-6.2297209273659115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1793428586243!5m2!1sid!2sid" width="100%" height="190" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
            // 'headline' => 'HFD Corp is a lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla vitae ad sit, tempora accusamus accusantium necessitatibus libero quo.',
            // 'email' => 'hfdcorp@example.com',
            // 'phone' => '03' . fake()->numerify('########'), // 10 digit
            // 'whatsapp' => '08' . fake()->numerify('##########'), // 12 digit
            // 'instagram' => 'https://www.instagram.com/xxx',
            // 'tiktok' => 'https://www.tiktok.com/@xxx',
            // 'youtube' => 'https://www.youtube.com/@xxx',
            // 'facebook' => 'https://www.facebook.com/xxx',
            // 'linkedin' => 'https://www.linkedin.com/xxx',
            'user_id' => 1,
        ]);
    }
}
