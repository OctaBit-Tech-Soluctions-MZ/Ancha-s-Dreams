<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JqueryToast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title, public $message, public $background = 'rgba(0,0,0,0.2)', 
                                        public $icon = 'success' ,public $position = 'top-end')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.jquery-toast');
    }
}
