@extends('layouts.app')

@section('title', 'Livros | ')

@section('subheading', 'Livros que Temperam o Conhecimento')

@section('headingtext', 'Sabores e saberes em cada página.')

@section('content')

<div class="container p-5">
    <div class="row">
        <!-- Lista de Livros -->
        <div class="row">
            <h2 class="mb-2 text-center"><i class="fa fa-book"></i> Compre o seu Livro sem sair de casa</h2>
            <div class="p-3">
                <x-filter :categories="$categories" :route="route('book')" :item="'livro'"/>
            </div>
            <div class="row">
                @foreach ($books as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div> <!-- Fim Lista Livros -->
    </div><br><br>

@endsection