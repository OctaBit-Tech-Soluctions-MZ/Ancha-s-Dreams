<?php

namespace App\Livewire\Lesson;

use App\Models\Content;
use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class ListLivewire extends Component
{
    public $slug,
            $load = false,
            $confirmDelete = false,
            $id = 0,
            $display = 'd-none';

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    function showModal(){
        $this->display = 'show d-block';
    }

    public function confirm($id){
        $this->id = $id;
        $confirmDelete = true;
    }

    public function render()
    {
        $course = Course::where('slug', $this->slug)->firstOrFail();
        $contents = $this->load? Content::where('course_id', $course->id)->paginate(5) : [];
        return view('livewire.lesson.list-livewire', compact('contents', 'course'));
    }

    public function loadLessons()
    {
        $this->load = true;
    }

    public function destroy($id){
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        Content::findOrFail($id)->delete();
        request()->session()->flash('success', 'Aula Excluida com sucesso');
    }
}
