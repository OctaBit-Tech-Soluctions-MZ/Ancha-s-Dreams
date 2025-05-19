<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class EditLivewire extends Component
{
    use WithFileUploads;
    public $name,
        $description,
        $price,
        $cover,
        $book = null,
        $type = "Outros",
        $cover_2,
        $is_digital = false;
        
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required',
        'cover' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'price' => 'required|numeric',
        'type' => 'required|string|max:255'
    ];

    protected $messages = [
        'name.required' => 'O nome é obrigatório.',
        'name.string' => 'O nome deve ser um texto.',
        'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        'type.required' => 'O nome é obrigatório.',
        'type.string' => 'O nome deve ser um texto.',
        'type.max' => 'O nome não pode ter mais de 255 caracteres.',
        'description.required' => 'A descrição é obrigatória.',
        'cover.required' => 'A foto do produto é obrigatória.',
        'cover.image' => 'A foto do produto deve ser uma imagem.',
        'cover.mimes' => 'A foto do produto deve ser do tipo: jpeg, png, jpg, gif ou webp.',
        'cover.max' => 'A foto do produto não pode ter mais de 2MB.',
        'book.required' => 'O arquivo do livro é obrigatório.',
        'book.file' => 'O arquivo do livro deve ser um arquivo.',
        'book.mimes' => 'O livro deve ser do tipo: pdf.',
        'book.max' => 'O arquivo do livro não pode ter mais de 150MB.',
        'price.required' => 'O preço é obrigatório.',
        'price.numeric' => 'O preço é numerico.',
    ];

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->cover_2 = $product->image;
        $this->book = $product->url;
        $this->type= $product->type;
        if ($product->type == 'Livro' && $product->url != null) {
            $this->is_digital = true;
        }

    }
    public function render()
    {
        return view('livewire.products.edit-livewire');
    }
}
