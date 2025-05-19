<?php

namespace App\Http\Middleware;

use App\Models\Content;
use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCoursePurchased
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $slug = $request->route('slug'); // Ou 'course' dependendo do nome na rota

        // Buscar o curso via slug
         $lesson = Content::where('slug', $slug)->first();

         if(!$lesson) {
            abort(404, 'Aula não encontrada.');
         }
         
         $course = $lesson->courses;

        if (!$course) {
            abort(404, 'Curso não encontrado.');
        }

        // Permitir admins
        if ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return $next($request);
        }

        // Permitir instructor responsavel pelo curso
        if($course->user_id == auth()->id()) {
            return $next($request);
        }

        // Verifica se o curso está associado ao usuário na tabela my_courses
        $hasCourse = $user->myCourses()->where('course_id', $course->id)->exists();

        if (!$hasCourse) {
            abort(403, 'Você não tem acesso a este curso.');
        }
        return $next($request);
    }
}
