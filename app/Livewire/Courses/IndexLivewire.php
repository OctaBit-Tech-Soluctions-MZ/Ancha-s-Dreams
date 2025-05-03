<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
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

        $courses = $query->paginate(12);
        return view('livewire.courses.index-livewire', compact('courses'));
    }
}
