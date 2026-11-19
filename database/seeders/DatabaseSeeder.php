<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@navelle.com'],
            [
                'name' => 'Admin Navelle',
                'password' => 'NavelleAdmin123!',
                'role' => 'admin',
            ]
        );
    }
}
