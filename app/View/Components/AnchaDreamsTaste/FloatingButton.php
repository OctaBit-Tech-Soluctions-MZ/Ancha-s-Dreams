<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FloatingButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $route, public $icon, public $title, public $bg = 'bg-success')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.floating-button');
    }
}
