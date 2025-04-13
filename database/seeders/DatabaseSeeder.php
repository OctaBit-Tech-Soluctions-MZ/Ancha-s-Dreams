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

<<<<<<< HEAD
        // $this->add_roles();

        // $this->add_fake_users();
=======
        $this->add_roles();

        $this->add_fake_users();
>>>>>>> 9fabbde (Primeiro commit)

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
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
<<<<<<< HEAD
            'role' => 1
        ]);

        User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => Hash::make('12345678'),
            'role' => 3
=======
            'role' => 'admin'
>>>>>>> 9fabbde (Primeiro commit)
        ]);


    }


    public function add_roles(){

        $role = new Role();
        
        $role->create([
<<<<<<< HEAD
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
=======
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
>>>>>>> 9fabbde (Primeiro commit)
        ]);

    }
}
