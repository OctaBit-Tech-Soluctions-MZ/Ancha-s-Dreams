<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $action, public $attachment, public $input = 'comment')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.form-comment');
    }
}
