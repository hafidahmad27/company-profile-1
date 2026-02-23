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
            'name' => 'HFD Corp',
            'email' => 'hfdcorp@test.com',
            'password' => '$2y$12$CaXICDebBAKn8t7rTsj2n..fubcvpnXvqLXBqjpIyHoXF8Qn4po7O',
        ]);
    }
}
