<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin', ['action' => 'destroy'])]
class ListInAdminPaineiLivewire extends Component
{
    public $id,
            $showModal = false;
    public function render()
    {
        $courses = Course::with('users')->paginate(10);
        return view('livewire.courses.list-in-admin-painei-livewire', compact('courses'));
    }

    public function publish($id, $value)
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        Course::findOrFail($id)->update([
            'published' => $value
        ]);
    }

    public function setId($id)
    {
        $this->id = $id;
        $this->showModal = true;
    }

    public function destroy()
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        dd($this->id);
        Course::findOrFail($this->id)->delete();

        request()->session()->flash('success', 'Curso Excluido com sucesso');
    }
}
