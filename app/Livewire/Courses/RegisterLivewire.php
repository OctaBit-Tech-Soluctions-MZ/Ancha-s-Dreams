<?php

namespace App\Livewire\Courses;

use App\Services\UploadService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.instructor')]
class RegisterLivewire extends Component
{

    use WithFileUploads;

    public $categories,
           $name,
           $description,
           $category,
           $price,
           $certificate = 1,
           $cover,
           $folder_id,
           $video_intro_name = '',
           $video_intro = null,
           $show = false;

    protected $rules = [
        'name'         => 'required|string|max:255',
        'price'        => 'required|numeric',
        'description'  => 'required',
        'cover'        => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        'categories.required' => 'A categoria é obrigatória.',
        'categories.string' => 'A categoria deve ser um texto.',
    ];

    public function showForm(){
        if ($this->show) {
            $this->show = false;
        }else{
            $this->show = true;
        }
    }

    public function mount() {
    }
    public function render()
    {
        return view('livewire.courses.register-livewire');
    }

    public function create()
    {
        $this->validate();
            $upload = new UploadService($this->cover);
            $cover = $upload->upload('courses')['name'];

            $course = auth()->user()->courses()->create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'certificate' => 1,
                'cover' => $cover,
            ]);
        

            if (empty($this->video_intro_name) && $this->video_intro =! null) {
                // Nâo esquecer de colocar um upload job
            }

            $this->reset('name', 'description', 'price', 'cover');
            request()->session()->flash('success', 'Curso Criado com successo ');
    }
}
