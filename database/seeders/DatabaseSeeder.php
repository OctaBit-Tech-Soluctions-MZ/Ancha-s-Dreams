<?php

namespace Database\Seeders;

use App\Helper\GenerateID;
use App\Models\Category;
use App\Models\Course;
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

        $this->add_roles();

        $this->add_fake_users();

        $this->add_fake_categorys();
    }

    public function add_fake_categorys() {
        $category = new Category();
        $category->create([
            'name' => 'Culinaria Nacional (Moz)',
        ]);
        $category->create([
            'name' => 'Culinaria Francesa',
        ]);
        $category->create([
            'name' => 'Culinaria Chinesa',
        ]);
        $category->create([
            'name' => 'Culinaria Japonesa',
        ]);
    }

    public function add_fake_users(){

        User::factory()->create([
            'name' => 'Admin User',
            'surname' => 'teste',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone_number' => '841515705'
        ]);


    }


    public function add_roles(){

        $role = new Role();
        
        $role->create([
            'role_key' => 'admin',
            'role_name' => 'administrador',
            'route' => 'admin.dashboard',
        ]);

        $role->create([
            'role_key' => 'student',
            'role_name' => 'Aluno',
            'route' => 'home',
        ]);
        
        $role->create([
            'role_key' => 'instructor',
            'role_name' => 'Instrutor',
            'route' => 'instructor.dashboard',
        ]);

    }
}
