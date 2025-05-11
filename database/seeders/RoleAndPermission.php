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
        $course = ['Registar', 'Visualizar', 'Editar', 'Excluir', 'publicar', 'despublicar'];
        $contentTypes = ['Livros', 'Receitas', 'Produtos'];
        $admins = ['admin'];
        $roles = ['admin', 'super admin', 'instrutor', 'aluno'];
        $lessonExam = ['Aulas', 'Exame'];
        $lessonExamActions = ['Registar', 'Visualizar', 'Editar', 'Excluir'];
        $studentActions = ['Registar', 'Visualizar', 'Editar', 'Excluir', 'bloquear'];

        $permissions = [];

        // Courses
        foreach ($course as $action) {
            $permissions[] = "$action Curso";
        }

        // Content (Livros, Receitas, Produtos)
        foreach ($contentTypes as $type) {
            foreach ($course as $action) {
                $permissions[] = "$action $type";
            }
        }

        // Admins
        foreach ($admins as $admin) {
            foreach (['Registar', 'Visualizar', 'Editar', 'Excluir', 'bloquear'] as $action) {
                $permissions[] = "$action $admin";
            }
        }

        // instrutor
        foreach (['Registar', 'Visualizar', 'Editar', 'Excluir', 'bloquear'] as $action) {
            $permissions[] = "$action instrutor";
        }

        // Student
        foreach ($studentActions as $action) {
            $permissions[] = "$action Aluno";
        }

        // Lesson & Exam
        foreach ($lessonExam as $item) {
            foreach ($lessonExamActions as $action) {
                $permissions[] = "$action $item";
            }
        }
        $permissions[] = 'Assistir Aulas';
        $permissions[] = 'Fazer Exame';

        // Buy
        foreach (['Curso', 'Livros', 'Produtos'] as $item) {
            $permissions[] = "Comprar $item";
        }

        // Cria permissões
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // SUPER ADMIN
        $superAdmin = Role::firstOrCreate(['name' => 'super admin', 'route' => 'admin']);
        $superAdmin->syncPermissions([
            'Registar admin','Visualizar admin','Excluir admin', 'bloquear admin',
            'Registar instrutor', 'Visualizar instrutor', 'Excluir instrutor','bloquear instrutor',
            'Visualizar Curso', 'Excluir Curso', 'publicar Curso', 'despublicar Curso',
            'Visualizar Livros', 'Excluir Livros', 'publicar Livros', 'despublicar Livros',
            'Visualizar Receitas', 'Excluir Receitas', 'publicar Receitas', 'despublicar Receitas',
            'Visualizar Produtos', 'Excluir Produtos', 'publicar Produtos', 'despublicar Produtos',
            'Visualizar Aulas', 'Visualizar Exame',
            'Visualizar Aluno', 'bloquear Aluno', 'Excluir Aluno',
        ]);

        // ADMIN
        $admin = Role::firstOrCreate(['name' => 'admin', 'route' => 'admin']);
        $admin->syncPermissions([
            'Visualizar admin',
            'Registar instrutor', 'Visualizar instrutor', 'Excluir instrutor', 'bloquear instrutor',
            'Visualizar Curso', 'Excluir Curso', 'publicar Curso', 'despublicar Curso',
            'Visualizar Livros', 'Excluir Livros', 'publicar Livros', 'despublicar Livros',
            'Visualizar Receitas', 'Excluir Receitas', 'publicar Receitas', 'despublicar Receitas',
            'Visualizar Produtos', 'Excluir Produtos', 'publicar Produtos', 'despublicar Produtos',
            'Visualizar Aulas', 'Visualizar Exame',
            'Visualizar Aluno', 'bloquear Aluno', 'Excluir Aluno',
        ]);

        // instrutor
        $instrutor = Role::firstOrCreate(['name' => 'instrutor', 'route' => 'dashboard']);
        $instrutor->syncPermissions([
            'Registar Curso', 'Visualizar Curso', 'Editar Curso', 'Excluir Curso',
            'Registar Aulas', 'Visualizar Aulas', 'Editar Aulas', 'Excluir Aulas',
            'Registar Exame', 'Visualizar Exame', 'Editar Exame', 'Excluir Exame',
            'Visualizar Aluno',
        ]);

        // STUDENT
        $student = Role::firstOrCreate(['name' => 'aluno']);
        $student->syncPermissions([
            'Registar Aluno', 'Visualizar Aluno', 'Editar Aluno', 'Excluir Aluno',
            'Visualizar Aulas', 'Assistir Aulas',
            'Fazer Exame',
            'Comprar Curso', 'Comprar Livros', 'Comprar Produtos',
        ]);
    }
}
