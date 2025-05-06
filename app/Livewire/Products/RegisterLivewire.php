<?php

namespace App\Livewire\Products;

use App\Services\UploadService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class RegisterLivewire extends Component
{
    use WithFileUploads;
    public $name,
           $description,
           $price,
           $cover,
           $qtd;
    public function render()
    {
        return view('livewire.products.register-livewire');
    }

    public function create(){
        $update = new UploadService($this->cover);
        $cover = $update->upload('products')['name'];
        auth()->user()->products()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $cover,
            'qtd' => $this->qtd
        ]);

        request()->session()->flash('success', 'Produto '.$this->name.' Registado com sucesso');
    }
}
