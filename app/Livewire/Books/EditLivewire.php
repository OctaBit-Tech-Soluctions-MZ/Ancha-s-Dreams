<?php

namespace App\Livewire\Books;

use App\Models\Book;
use App\Services\UploadService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class EditLivewire extends Component
{
    use WithFileUploads;
    public $title,
        $cover,
        $cover_2,
        $description,
        $author,
        $book,
        $price,
        $qtd,
        $is_digital = false,
        $slug;
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required',
        'author' => 'required|string|max:255',
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
        'price.required' => 'O preço é obrigatório.',
        'price.numeric' => 'O preço é numerico.',
    ];

    public function mount($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $this->title = $book->title;
        $this->description = $book->description;
        $this->author = $book->author;
        $this->price = $book->price;
        $this->qtd = $book->qtd;
        $this->is_digital = $book->is_digital;
        $this->cover_2 = $book->cover;
        $this->slug = $book->slug;
    }

    public function isDigital()
    {
        if ($this->is_digital) {
            $this->is_digital = false;
        } else {
            $this->is_digital =  true;
        }
    }

    public function render()
    {
        return view('livewire.books.edit-livewire');
    }

    public function update()
    {
        if (!$this->cover) {
            $upload = new UploadService($this->cover);
            $cover = $upload->upload('books')['name'];
        }
        Book::where('slug', $this->slug)->firstOrFail()->update([
            'title' => $this->title,
            'description' => $this->description,
            'cover' => !empty($this->cover) ? $cover : $this->cover_2,
            'author' => $this->author,
            'price' => $this->price,
            'qtd' => !$this->is_digital ? $this->qtd : null,
            'is_digital' => $this->is_digital,

        ]);
        return redirect()->route('books.list')->with('success', 'Livro ' . $this->title . ' Editado com sucesso');
    }
}
