<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Bahar Dev',
            'email' => 'bahar32harz@gmail.com',
            'password' => Hash::make("admin123")
        ]);
    }
}
