<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonLoading extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.button-loading');
    }
}
