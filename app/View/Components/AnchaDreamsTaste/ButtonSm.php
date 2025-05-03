<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonSm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $route, public $icon, public $name)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.button-sm');
    }
}
