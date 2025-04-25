@extends('layouts.admin')

@section('title', 'Editando dados do Livro '.$book->title)

@section('content')


<div class="p-4">
    <div class="panel card shadow-sm border border-0 mb-3 p-3">
        <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Edicao de Livros</h1>
    </div>
    <div class="panel card shadow-sm border border-0">
        <div class="panel-body bio-graph-info p-3">
            <div class="card-body">
                @if($errors->any())
                    <div style="color:red">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Titulo do Livro</label>
                        <input type="text" class="form-control" placeholder="informe o Titulo do Livro" id="title"
                            name="title" value="{{ $book->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Descricao do Livro</label>
                        <input type="hidden" name="description" id="description" value="{{ $book->description }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="author">Autor do Livro</label>
                        <input type="text" class="form-control" placeholder="informe o autor do Livro" id="author"
                            name="author" value="{{ $book->author }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="book_photo" >Anexe a Capa do Livro</label>
                            <input type="file" class="form-control" id="book_photo" name="book_photo">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="book" >Anexe o Livro em PDF</label>
                            <input type="file" class="form-control" id="book" name="book">
                        </div>
                    </div>
                        <div class="mt-4">
                            <button class="btn btn-primary btn-sm" type="submit">
                                {{ __('Editar Livro') }}
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection