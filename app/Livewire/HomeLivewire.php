<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;

class HomeLivewire extends Component
{
    public function render()
    {
        $testimonials = Testimonial::with(['users' => function ($query){
            $query->with('roles');
        }])->take(6)->get();
        return view('livewire.home-livewire', compact('testimonials'));
    }
}
