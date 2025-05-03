<?php

namespace App\View\Components\AnchaDreamsTaste;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct(public $route, public $placeholder, public $person)
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.filter');
    }
}
