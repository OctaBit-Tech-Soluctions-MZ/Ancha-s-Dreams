<?php

namespace App\Livewire\Courses;

use App\Models\Category;
use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

use function PHPUnit\Framework\isString;

#[Layout('layouts.instructor')]
class EditLivewire extends Component
{
    use WithFileUploads;

    public $categories,
        $name,
        $description,
        $price,
        $cover,
        $cover_2,
        $slug;

    protected $rules = [
        'name'         => 'required|string|max:255',
        'price'        => 'required|numeric',
        'description'  => 'required',
    ];

    protected $messages = [
        'name.required' => 'O nome é obrigatório.',
        'name.string' => 'O nome deve ser um texto.',
        'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        'price.required' => 'O preço é obrigatório.',
        'price.numeric' => 'O preço deve ser um número.',
        'description.required' => 'A descrição é obrigatória.',
        'description.string' => 'A descrição deve ser um texto.',
        'cover.required' => 'A foto do curso é obrigatória.',
        'cover.image' => 'O arquivo da foto do curso deve ser uma imagem.',
        'cover.mimes' => 'A foto do curso deve ser do tipo: jpeg, png, jpg ou gif.',
        'cover.max' => 'A foto do curso não pode ter mais de 2MB.',
    ];

    public function mount($slug)
    {
        $this->categories = Category::all();

        $course = Course::where('slug', $slug)->firstOrFail();

        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;
        $this->cover_2 = $course->cover;
        $this->slug = $course->slug;
    }
    public function render()
    {
        return view('livewire.courses.edit-livewire');
    }

    public function update($slug){
        $this->validate();
        $course = Course::where('slug', $slug)->firstOrFail();
        $course->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'cover' => !empty($this->cover) ? $this->cover : $this->cover_2,
        ]);

        request()->session()->flash('success', 'Curso actualizado com suceso');
        redirect(route('courses.instructor'), navigate: true);
    }
}
