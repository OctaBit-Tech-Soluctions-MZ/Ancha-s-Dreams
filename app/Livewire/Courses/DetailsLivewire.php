<?php

namespace App\Livewire\Courses;

use App\Models\Content;
use App\Models\Course;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class DetailsLivewire extends Component
{
    public $slug,
        $comment,
        $rate = 0,
        $rate_details = 0,
        $hoverRating = 0,
        $course,
        $totalCourses,
        $recommendedCourses,
        $uniqueStudentCount;
    public $unlockedLessons = [];

    public function mount($slug)
    {
        $this->$slug = $slug;
        // Carrega o curso com o instrutor
        $this->course = Course::with(
            ['users' => function ($query) {
                $query->withCount('courses');
            }, 'testimonials' => function ($query) {
                $query->with('users');
            }, 'exams' => function ($query) {
                $query->where('status', 'published');
            }, 'myCourses']
        )->where('slug', $this->slug)->firstOrFail();
        // Contar alunos únicos
        $this->uniqueStudentCount = Course::where('user_id', $this->course->user_id)->get()
            ->flatMap(fn($__course) => $__course->myCourses->pluck('user_id'))
            ->unique()
            ->count();

        $sum = 0;
        $count = 0;
        if (count($this->course->testimonials) != 0) {
            foreach ($this->course->testimonials as $testimonial) {
                $sum = $sum + $testimonial->rate;
                $count = $count + 1;
            }
            $this->rate_details = $sum / $count;
        }

        // Obtém os cursos do mesmo instrutor, excluindo o curso atual
        $this->recommendedCourses = Course::where('user_id', $this->course->user_id)
            ->where('slug', '!=', $this->slug)  // Exclui o curso atual
            ->take(2)  // Limita a 2 cursos recomendados
            ->get();

        $this->totalCourses = Course::where('user_id', $this->course->users->id)->count();

        if (auth()->check()) {
            $this->checkUnlockedLessons(auth()->user());
        }
    }

    private function checkUnlockedLessons($user)
    {
        $this->unlockedLessons = [];
        $contents = Content::where('course_id', $this->course->id)->orderBy('order')->get();

        foreach ($contents as $key => $content) {
            if ($key === 0) {
                $this->unlockedLessons[$content->id] = true; // Primeira lição sempre desbloqueada
            } else {
                $previous = $contents[$key - 1];
                $prevWatched = DB::table('content_users')
                    ->where('user_id', $user->id)
                    ->where('content_id', $previous->id)
                    ->where('watched', true)
                    ->exists();

                $this->unlockedLessons[$content->id] = $prevWatched;
            }
        }
    }
    // private function checkUnlockedLastLesson($user)
    // {
    //     $this->unlockedLessons = [];
    //     $contents = Content::where('course_id', $this->course->id)->orderBy('order')->get();
    //     $last = $contents[$contents->count() - 1];
    //     $prevWatched = DB::table('content_users')
    //         ->where('user_id', $user->id)
    //         ->where('content_id', $last->id)
    //         ->where('watched', true)
    //         ->exists();

    //     $this->unlockedLessons[$content->id] = $prevWatched;
    // }

    public function setRating($rate)
    {
        $this->rate = $rate;
    }

    public function render()
    {
        return view('livewire.courses.details-livewire');
    }


    public function addToCart($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        // Verifica se o curso já está no carrinho
        $exists = Cart::search(function ($cartItem, $rowId) use ($course) {
            return $cartItem->id === $course->id;
        })->isNotEmpty();

        if ($exists) {
            request()->session()->flash('warning', 'Este curso já está na sua carrinha de compras.');
        } else {
            Cart::add([
                'id'      => $course->id,
                'name'    => $course->name,
                'qty'     => 1,
                'price'   => $course->price,
                'weight'  => 0,
                'options' => [
                    'cover' => 'courses/' . $course->cover,
                    'allow_multiple' => false,
                    'model' => Course::class
                ]
            ]);

            request()->session()->flash('success', 'Curso adicionado com sucesso à carrinha de compras.');
        }

        return redirect()->back();
    }

    public function sendTestimonial()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->hasAnyRole('aluno')) {
            return request()->session()->flash('warning', 'Não tem autorização para realização essa operação');
        }

        $course = Course::where('slug', $this->slug)->firstOrFail();
        $course->testimonials()->create([
            'user_id' => auth()->id(),
            'comment' => $this->comment,
            'rate'    => $this->rate
        ]);
        request()->session()->flash('success', 'Testemunho feito com sucesso');
        $this->reset('rate', 'comment');
    }
}
