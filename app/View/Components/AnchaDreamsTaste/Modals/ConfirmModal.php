<?php

namespace App\View\Components\AnchaDreamsTaste\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $action ,public $show = 'd-none', public $message = 'Tem certeza que deseja realizar a operação?')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.modals.confirm-modal');
    }
}
