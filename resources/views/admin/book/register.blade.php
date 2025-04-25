@extends('layouts.admin')

@section('title', 'Registo de Livros')

@section('page', 'Formulario de Registo de Livros')

@section('content')


<div class="p-4">
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
                    <div class="form-group row">
                        <div class="mb-3 col-sm-6">
                            <label class="form-label" for="title">Titulo do Livro</label>
                            <input type="text" class="form-control" placeholder="informe o Titulo do Livro" id="title"
                                name="title" :value="old('title')">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label class="form-label" for="author">Autor do Livro</label>
                            <input type="text" class="form-control" placeholder="informe o autor do Livro" id="author"
                                name="author" :value="old('author')">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Descricao do Livro</label>
                        <input type="hidden" name="description" id="description">
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Preço do Livro</label>
                        <div class="range">
                            <div class="sliderValue">
                                <span>100</span>
                            </div>
                            <div class="field">
                                <div class="value left">0</div>
                                <input type="range" min="10" max="200" value="100" steps="1" name="price" id="price">
                                <div class="value right">200</div>
                            </div>
                        </div>
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
                                {{ __('Registar Livro') }}
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection