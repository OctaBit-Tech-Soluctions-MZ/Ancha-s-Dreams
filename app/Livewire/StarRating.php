<?php

namespace App\Livewire;

use Livewire\Component;

class StarRating extends Component
{
    public array $stars = [];
    public int $rate = 0;
    public int $i = 0;
    public int $font_size;
    public function mount(int $rate, $font_size = 25, array $stars = [1 => 'Pessimo',
                                    2 => 'Suficiente',
                                    3 => 'Bom',
                                    4 => 'Excelente',
                                    5 => 'WOW!!!'])
    {
        $this->rate = $rate;
        $this->stars = $stars;
        $this->font_size = $font_size;
    }

    public function render()
    {
        return view('livewire.star-rating');
    }
}
