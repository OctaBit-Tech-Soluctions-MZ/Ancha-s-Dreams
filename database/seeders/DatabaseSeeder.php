<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleAndPermissionSeed::class
        ]);

        // $this->add_super_admin();

        // $this->add_fake_categorys();
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

    public function add_super_admin(){

        $user = User::factory()->create([
            'name' => 'Admin User',
            'surname' => 'teste',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '841515705',
            'slug' => 'admin-user',
        ]);
        $user->assignRole('super admin');

    }
}
