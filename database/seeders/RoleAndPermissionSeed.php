<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'super admin',
            'route' => 'admin.dashboard',
        ]);
        Role::create([
            'name' => 'admin',
            'route' => 'admin.dashboard',
        ]);
        Role::create([
            'name' => 'student',
            'route' => 'home',
        ]);
        Role::create([
            'name' => 'instructor',
            'route' => 'instructor.dashboard',
        ]);
    }
}
