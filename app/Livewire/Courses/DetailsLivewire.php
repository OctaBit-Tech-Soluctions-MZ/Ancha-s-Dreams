<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class DetailsLivewire extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->$slug = $slug;
    }

    public function render()
    {
        // Carrega o curso com o instrutor
        $course = Course::with(['users' => function ($query) {
            $query->withCount('courses');
        }])->where('slug', $this->slug)
            ->firstOrFail();
        // Obtém os cursos do mesmo instrutor, excluindo o curso atual
        $recommendedCourses = Course::where('user_id', $course->user_id)
            ->where('slug', '!=', $this->slug)  // Exclui o curso atual
            ->take(2)  // Limita a 2 cursos recomendados
            ->get();
        $totalCourses = Course::where('user_id', $course->users->id)->count();
        return view('livewire.courses.details-livewire', compact('course', 'recommendedCourses', 'totalCourses'));
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
}
