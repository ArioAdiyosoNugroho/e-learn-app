<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@example.com',
        ]);
        User::factory()->create([
            'name' => 'andi',
            'username' => 'andi123',
            'role' => 'siswa',
            'password' => Hash::make('password'),
            'email' => 'andi@example.com',
        ]);
        User::factory()->create([
            'name' => 'guru',
            'username' => 'guru123',
            'role' => 'guru',
            'password' => Hash::make('password'),
            'email' => 'guru@example.com',
        ]);
    }
}
