<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    
    use WithPagination;

    public $search = '';
    public $category = '';
    public $orderBy = 'default';

    protected string $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'orderBy' => ['except' => 'default'],
        'page' => ['except' => 1],
    ];

    public function updated($property)
    {
        if (in_array($property, ['search', 'category', 'orderBy'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Course::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        switch ($this->orderBy) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest(); // padrão
        }

        $query->where('published', '=', true);

        $courses = $query->paginate(12);
        return view('livewire.courses.index-livewire', compact('courses'));
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
