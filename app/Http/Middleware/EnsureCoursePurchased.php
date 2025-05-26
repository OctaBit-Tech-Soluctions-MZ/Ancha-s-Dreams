<?php
namespace App\Http\Middleware;

use App\Models\Content;
use App\Models\Exam;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCoursePurchased
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        $slug = $request->route('slug'); // slug da aula
        $id = $request->route('id');     // id do exame (caso seja rota de exame)

        $course = null;

        // Tenta obter a aula via slug
        if ($slug) {
            $lesson = Content::where('slug', $slug)->first();

            if (!$lesson) {
                abort(404, 'Aula não encontrada.');
            }

            $course = optional($lesson)->courses;
        }

        // Ou tenta obter o exame via ID
        if (!$course && $id) {
            $exam = Exam::find($id);

            if (!$exam) {
                abort(404, 'Exame não encontrado.');
            }

            $course = optional($exam)->courses;
        }

        if (!$course) {
            abort(404, 'Curso relacionado não encontrado.');
        }

        // Permitir administradores
        if ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return $next($request);
        }

        // Permitir instrutor do curso
        if ($course->user_id === $user->id) {
            return $next($request);
        }

        // Verifica se o usuário comprou o curso (tabela my_courses)
        $hasCourse = $user->myCourses()->where('course_id', $course->id)->exists();

        if (!$hasCourse) {
            abort(403, 'Você não tem acesso a este curso.');
        }

        return $next($request);
    }
}
