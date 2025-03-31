<?php

namespace Database\Seeders;

use App\Helper\GenerateID;
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

        $this->add_fake_courses();
    }

    public function add_fake_users(){

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);

        User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => Hash::make('12345678'),
            'role' => 3
        ]);


    }

    public function add_fake_courses(){
        $course = new Course();

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Confeitaria Profissional',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 450,
            'course_photo_path'=> '/assets/img/maxresdefault-2-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Culinária Internacional',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 1450,
            'course_photo_path'=> '/assets/img/sobremesas-de-pascoa-10-receitas-deliciosas-para-adocar-o-feriado-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Curso de Fast Food',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 950,
            'course_photo_path'=> '/assets/img/maxresdefault-2-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Culinária Internacional',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 1450,
            'course_photo_path'=> '/assets/img/sobremesas-de-pascoa-10-receitas-deliciosas-para-adocar-o-feriado-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Curso de Fast Food',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 950,
            'course_photo_path'=> '/assets/img/maxresdefault-2-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Culinária Internacional',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 1450,
            'course_photo_path'=> '/assets/img/sobremesas-de-pascoa-10-receitas-deliciosas-para-adocar-o-feriado-870x440.jpg' ,
            'teacher' => 2,

        ]);

        $course->create([
            'course_id' => GenerateID::exists($course, 'c', ['min' => 10, 'max' => 99],['min'=> 100, 'max'=> 999]),
            'name' => 'Curso de Fast Food',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                              Iure asperiores neque, amet repellat ratione voluptates consequatur cum, 
                              quis impedit iste culpa inventore! Cumque maxime minima quis ut cum 
                              distinctio perspiciatis?',
            'price' => 950,
            'course_photo_path'=> '/assets/img/maxresdefault-2-870x440.jpg' ,
            'teacher' => 2,

        ]);
    }

    public function add_roles(){

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

    }
}
