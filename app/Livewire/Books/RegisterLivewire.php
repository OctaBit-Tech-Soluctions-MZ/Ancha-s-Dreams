<?php

namespace App\Livewire\Books;

use App\Models\Book;
use App\Services\UploadService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class RegisterLivewire extends Component
{
    use WithFileUploads;
    public $title,
           $cover,
           $description,
           $author,
           $book,
           $price,
           $qtd,
           $is_digital = false;
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required',
        'author' => 'required|string|max:255',
        'cover' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'price' => 'required|numeric'
    ];

    protected $messages = [
        'title.required' => 'O título é obrigatório.',
        'title.string' => 'O título deve ser um texto.',
        'title.max' => 'O título não pode ter mais de 255 caracteres.',
        'description.required' => 'A descrição é obrigatória.',
        'author.required' => 'O autor é obrigatório.',
        'author.string' => 'O autor deve ser um texto.',
        'author.max' => 'O autor não pode ter mais de 255 caracteres.',
        'cover.required' => 'A foto do livro é obrigatória.',
        'cover.image' => 'A foto do livro deve ser uma imagem.',
        'cover.mimes' => 'A foto do livro deve ser do tipo: jpeg, png, jpg, gif ou webp.',
        'cover.max' => 'A foto do livro não pode ter mais de 2MB.',
        'book.required' => 'O arquivo do livro é obrigatório.',
        'book.file' => 'O arquivo do livro deve ser um arquivo.',
        'book.mimes' => 'O livro deve ser do tipo: pdf.',
        'book.max' => 'O arquivo do livro não pode ter mais de 150MB.',
        'price.required'=> 'O preço é obrigatório.',
        'price.numeric' => 'O preço é numerico.',
    ];

    public function render()
    {
        return view('livewire.books.register-livewire');
    }

    public function isDigital()
    {
        if ($this->is_digital) {
            $this->is_digital = false;
        } else {
            $this->is_digital =  true;
        }
    }

    public function create() {
        $this->validate();
        $upload = new UploadService($this->cover);
        $cover = $upload->upload('books')['name'];
        Book::create([
            'title' => $this->title,
            'description' => $this->description,
            'cover' => $cover,
            'author' => $this->author,
            'price' => $this->price,
            'qtd' => !$this->is_digital? $this->qtd : null,
            'is_digital' => $this->is_digital,
        ]);

        request()->session()->flash('success', 'Livro '.$this->title.' Registado com sucesso');

        $this->reset('title', 'description', 'cover', 'author', 'price', 'qtd', 'book');
    }
}
