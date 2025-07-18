<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Sucursal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        Categoria::factory(50)->create();
        Sucursal::factory(50)->create();
    }
}
