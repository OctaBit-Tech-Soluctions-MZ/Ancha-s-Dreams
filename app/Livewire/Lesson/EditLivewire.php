<?php

namespace App\Livewire\Lesson;

use App\Models\Content;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.instructor')]
class EditLivewire extends Component
{
    use WithFileUploads;

    public $title,
           $description,
           $video,
           $slug,
           $slug_course;
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ];

    protected $messages = [
        'title.required' => 'O título é obrigatório.',
        'title.string' => 'O título deve ser um texto.',
        'title.max' => 'O título não pode ter mais de 255 caracteres.',
        'description.required' => 'A descrição é obrigatória.',
        'description.string' => 'A descrição deve ser um texto.',
        'video.required' => 'O vídeo é obrigatório.',
        'video.file' => 'O arquivo deve ser um vídeo.',
        'video.mimes' => 'O vídeo deve ser do tipo: mp4, avi, mov, mkv ou webm.',
        'video.max' => 'O vídeo não pode ter mais de 200 MB.',
    ];

    public function mount($slug)
    {
        $this->slug = $slug;
        $content = Content::where('slug', $slug)->firstOrFail();
        $this->title = $content->title;
        $this->description = $content->description;
        $this->video = $content->url;
        $this->slug_course = $content->courses->slug;
    }
    
    public function render()
    {
        return view('livewire.lesson.edit-livewire');
    }
}
