<?php

namespace App\Livewire\Lesson;

use App\Jobs\UploadVideoToGoogleDriveJob;
use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.instructor')]
class RegisterLivewire extends Component
{
    use WithFileUploads;

    public $title,
           $description,
           $video,
           $slug;
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'video' => 'required|file|mimes:mp4,avi,mov,mkv,webm|max:102400'
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
    }

    public function render()
    {
        return view('livewire.lesson.register-livewire');
    }

    public function create(){
        
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }

        $this->validate();
        $course = Course::where('slug', $this->slug)->firstOrFail();
        $maxOrder = $course->contents->max('order');
        $newOrder = $maxOrder ? $maxOrder + 1 : 1;
        $content = $course->contents()->create([
            'title' => $this->title,
            'description' => $this->description,
            'order' => $newOrder,
        ]);

        $path = $this->video->store('tmp');

        UploadVideoToGoogleDriveJob::dispatch($content->id, basename($path), $this->title, $course->folder_id);

        request()->session()->flash('success', 'Aula Registada com sucesso');

    }
}
