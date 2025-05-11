<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleProgressBar extends Component
{
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($value = 67)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.single-progress-bar');
    }
}
