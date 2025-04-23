<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class shortText extends Component
{
    public $text;
    public $limit;
    /**
     * Create a new component instance.
     */
    public function __construct($text, $limit = 100)
    {
        $this->text = $text;
        $this->limit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.short-text');
    }
}
