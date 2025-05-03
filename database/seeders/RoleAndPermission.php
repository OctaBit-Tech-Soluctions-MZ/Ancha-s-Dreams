<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Define permissões
        $course = ['create', 'read', 'update', 'delete', 'publish', 'unpublish'];
        $contentTypes = ['book', 'recipe', 'product'];
        $admins = ['admin'];
        $roles = ['admin', 'super-admin', 'instructor', 'student'];
        $lessonExam = ['lesson', 'exam'];
        $lessonExamActions = ['create', 'read', 'update', 'delete'];
        $studentActions = ['create', 'read', 'update', 'delete', 'block'];

        $permissions = [];

        // Courses
        foreach ($course as $action) {
            $permissions[] = "$action-course";
        }

        // Content (book, recipe, product)
        foreach ($contentTypes as $type) {
            foreach ($course as $action) {
                $permissions[] = "$action-$type";
            }
        }

        // Admins
        foreach ($admins as $admin) {
            foreach (['create', 'read', 'update', 'delete', 'block'] as $action) {
                $permissions[] = "$action-$admin";
            }
        }

        // Instructor
        foreach (['create', 'read', 'update', 'delete', 'block'] as $action) {
            $permissions[] = "$action-instructor";
        }

        // Student
        foreach ($studentActions as $action) {
            $permissions[] = "$action-student";
        }

        // Lesson & Exam
        foreach ($lessonExam as $item) {
            foreach ($lessonExamActions as $action) {
                $permissions[] = "$action-$item";
            }
        }
        $permissions[] = 'watch-lesson';
        $permissions[] = 'take-exam';

        // Buy
        foreach (['course', 'book', 'product'] as $item) {
            $permissions[] = "buy-$item";
        }

        // Cria permissões
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // SUPER ADMIN
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'route' => 'admin']);
        $superAdmin->syncPermissions([
            'create-admin','read-admin','delete-admin', 'block-admin',
            'create-instructor', 'read-instructor', 'delete-instructor','block-instructor',
            'read-course', 'delete-course', 'publish-course', 'unpublish-course',
            'read-book', 'delete-book', 'publish-book', 'unpublish-book',
            'read-recipe', 'delete-recipe', 'publish-recipe', 'unpublish-recipe',
            'read-product', 'delete-product', 'publish-product', 'unpublish-product',
            'read-lesson', 'read-exam',
            'read-student', 'block-student', 'delete-student',
        ]);

        // ADMIN
        $admin = Role::firstOrCreate(['name' => 'admin', 'route' => 'admin']);
        $admin->syncPermissions([
            'read-admin',
            'create-instructor', 'read-instructor', 'delete-instructor', 'block-instructor',
            'read-course', 'delete-course', 'publish-course', 'unpublish-course',
            'read-book', 'delete-book', 'publish-book', 'unpublish-book',
            'read-recipe', 'delete-recipe', 'publish-recipe', 'unpublish-recipe',
            'read-product', 'delete-product', 'publish-product', 'unpublish-product',
            'read-lesson', 'read-exam',
            'read-student', 'block-student', 'delete-student',
        ]);

        // INSTRUCTOR
        $instructor = Role::firstOrCreate(['name' => 'instructor', 'route' => 'dashboard']);
        $instructor->syncPermissions([
            'create-course', 'read-course', 'update-course', 'delete-course',
            'create-lesson', 'read-lesson', 'update-lesson', 'delete-lesson',
            'create-exam', 'read-exam', 'update-exam', 'delete-exam',
            'read-student',
        ]);

        // STUDENT
        $student = Role::firstOrCreate(['name' => 'student']);
        $student->syncPermissions([
            'create-student', 'read-student', 'update-student', 'delete-student',
            'read-lesson', 'watch-lesson',
            'take-exam',
            'buy-course', 'buy-book', 'buy-product',
        ]);
    }
}
