<?php

namespace Database\Seeders;

use App\Models\Providers;
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
        User::create([
            'username' => 'Admin',
            'email' => 'admin@contoh.com',
            'password' => Hash::make('password'),
        ]);
        // User::factory(10)->create();

        User::factory()->count(1000)->create();

        $providers = ['XL', 'Telkomsel', 'Three', 'IM3'];
        foreach($providers as $provider)
            Providers::create([
                'name' => $provider,
        ]);
    }
}
