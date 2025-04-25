<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BackButton extends Component
{
    public $back_url;
    public $page;
    /**
     * Create a new component instance.
     */
    public function __construct($page, $back_url = '')
    {
        $this->back_url = empty($back_url) ? getBackUrl() : $back_url;
        $this->page     = $page;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back-button');
    }
}
