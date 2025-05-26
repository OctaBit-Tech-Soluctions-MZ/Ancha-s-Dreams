<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use App\Models\MyCourse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    
    use WithPagination;

    public $search;

    protected string $paginationTheme = 'bootstrap';

    public function mount()
    {
    }

    public function render()
    {
        $query = Course::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $query->where('published', '=', true);
        $query->with('testimonials');

        $courses = $query->paginate(12);
        $myCourses = MyCourse::with(['courses' => function ($query){
            $query->with('testimonials');
        }])->where('user_id', auth()->id())->paginate(6);
        
        return view('livewire.courses.index-livewire', compact('courses', 'myCourses'));
    }

    public function addToCart($id)
    {
        $course = Course::findOrFail($id);
    
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
                'options' => ['cover' => 'courses/' . $course->cover,
                                'allow_multiple' => false,
                                'model' => Course::class
                                ]
            ]);
    
            request()->session()->flash('success', 'Curso adicionado com sucesso à carrinha de compras.');
        }
    
        return redirect()->back();
    }
}
