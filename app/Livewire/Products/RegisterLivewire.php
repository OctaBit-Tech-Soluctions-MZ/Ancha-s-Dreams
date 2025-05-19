<?php

namespace App\Livewire\Products;

use App\Jobs\UploadPdfToGoogleDriveJob;
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
        $book = null,
        $type = "Outros",
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
    
    public function render()
    {
        return view('livewire.products.register-livewire');
    }

    public function create()
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        if ($this->type == 'Livro') {
            if($this->is_digital){
                $this->rules['book'] = 'required|file|mimes:pdf|max:102400';
            }
        }
        $this->validate();
        $update = new UploadService($this->cover);
        $cover = $update->upload('products')['name'];
        $product = auth()->user()->products()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $cover,
            'type' => $this->type
        ]);

        if ($this->is_digital) {
            $filename = $this->book->store('tmp');
            UploadPdfToGoogleDriveJob::dispatch($product->id, basename($filename), $this->name);
        }

        $this->reset('name', 'description', 'price', 'cover', 'type', 'book', 'is_digital');
        return request()->session()->flash('success', 'Produto ' . $this->name . ' Registado com sucesso');
    }

    public function isDigital()
    {
        if ($this->is_digital) {
            $this->is_digital = false;
        } else {
            $this->is_digital =  true;
        }
    }

    public function setType($value)
    {
        $this->type = $value;
    }
}
