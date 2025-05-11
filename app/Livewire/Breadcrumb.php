<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public array $pages = [];
    public ?string $pageTitle = null;

    public function mount(array $pages = [], string $pageTitle = null)
    {
        $this->pages = $pages;
        $this->pageTitle = $pageTitle ?? end($pages)['label'] ?? 'Página';
    }
    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
