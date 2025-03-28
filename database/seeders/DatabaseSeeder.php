<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $role = new Role();
        
        $role->create([
            'name' => 'administrador',
            'route' => 'admin',
        ]);

        $role->create([
            'name' => 'Aluno',
            'route' => '/',
        ]);
        
        $role->create([
            'name' => 'Instrutor',
            'route' => '/',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);
    }
}
