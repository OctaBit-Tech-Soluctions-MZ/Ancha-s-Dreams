<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'Admin User',
            'surname' => 'teste',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '841515705',
            'slug' => 'admin-user',
        ]);
        $user->assignRole('super-admin');
    }
}
