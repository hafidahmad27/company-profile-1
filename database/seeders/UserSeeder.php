<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'hfdofficial1@gmail.com',
            'password' => '$2y$12$hKRDBW7teNmiuMzToYoiRe8RRGMG.yJR9UfiOsrYETwfLptWQqTEm',
        ]);
    }
}
