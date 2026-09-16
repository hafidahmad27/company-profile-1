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
            // 'phone' => '012345678910',
            // 'email' => 'hfdefghijklmno@gmail.com',
            // 'footer_about' => 'HFD Corp is a lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla vitae ad sit, tempora accusamus accusantium necessitatibus dignissimos libero adipisci quo.',
            'user_id' => 1,
        ]);
    }
}
