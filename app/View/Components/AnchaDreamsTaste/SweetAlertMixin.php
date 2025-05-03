<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SweetAlertMixin extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $message, public $type = 'success', public $position = 'top-end')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.sweet-alert-mixin');
    }
}
