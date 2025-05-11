<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ListLivewire extends Component
{
    use WithPagination;

    public $slug,
            $load = false;

    protected string $paginationTheme = 'bootstrap';
    
    public function render(Request $request)
    {
        $search = $request->search;
        $category = $request->categories;
        $orderBy = $request->order_by;

        $query = Course::query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($category) {
            $query->where('category', $category); // descomente e ajuste se necessário
        }

        if ($orderBy && in_array($orderBy, ['name', 'created_at'])) {
            $query->orderBy($orderBy);
        }

        $courses = $this->load? $query->paginate(6) : null;
        return view('livewire.courses.list-livewire',
                        compact('courses','search','category','orderBy',))
                        ->layout('layouts.instructor');
    }

    public function destroy($slug){
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }

        Course::where('slug',$slug)->firstOrFail()->delete();

        request()->session()->flash('success', 'Curso Removido com sucesso');
    }

    public function loadCourses()
    {
        $this->load = true;
    }
}
