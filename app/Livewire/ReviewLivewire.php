<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class ReviewLivewire extends Component
{
    public $slug,
        $name,
        $comment,
        $rate;

    public function mount($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $this->slug = $course->slug;
        $this->name = $course->name;
    }
    public function render()
    {
        return view('livewire.review-livewire');
    }

    
}
