@extends('layouts.app')

@section('title', 'Livros | ')

@section('subheading', 'Livros que Temperam o Conhecimento')

@section('headingtext', 'Sabores e saberes em cada página.')

@section('content')

<div class="container p-5">
    <div class="row">
        <!-- Lista de Livros -->
        <div class="row">
            <h2 class="mb-2 text-center">📖 Compre o seu Livro sem sair de casa</h2>
            <div class="p-3">
                <div class="p-2">
                    <form action="" method="get" class="row form-filter">
                        <div class="col-md-4 p-2">
                            <input type="text" name="search" id="search" class="form-control" placeholder="pesquise aqui...">
                        </div>
                        <div class="col-md-4 p-2">
                            <select name="category" id="category" class="form-select">
                                <option>Selecione uma categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <select name="order_by" id="order_by" class="form-select">
                                <option>Ordernar Por</option>
                                <option>A-Z</option>
                                <option>Recentes</option>
                                <option>Populares</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Aplicar Filtros</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card book-card shadow">
                            <img src="{{ asset('assets/img/books/'.$book->image_path) }}" alt="Livro 1">
                            <div class="card-body">
                                <h5>{{ $book->title }}</h5>
                                <p class="price">{{ $book->price }} MZN</p>
                                <button class="btn btn-add add-to-cart-btn"
                                            data-id="{{ $book->id }}"
                                            data-name="{{ $book->title }}"
                                            data-price="{{ $book->price }}"
                                            data-photo="{{ $book->image_path }}">
                                            <i class="fas fa-shopping-cart me-2"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- Fim Lista Livros -->
    </div><br><br>


@endsection