<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // បង្កើត Admin ទី ១ (គណនីដែលអ្នកចង់បាន)
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ]
        );

        // បង្កើត Admin ទី ២ (Chan Nuth)
        User::updateOrCreate(
            ['email' => 'nuth@gmail.com'],
            [
                'name' => 'Chan Nuth',
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ]
        );

        // បង្កើត User ធម្មតាសម្រាប់តេស្ត
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'General User',
                'password' => Hash::make('12345'),
                'role' => 'user',
            ]
        );
    }
}
