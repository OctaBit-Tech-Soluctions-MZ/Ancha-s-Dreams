<?php

namespace App\View\Components\AnchaDreamsTaste;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $productmodel;
    /**
     * Create a new component instance.
     */
    public function __construct($productmodel)
    {
        $this->productmodel = $productmodel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.product-card');
    }
}
