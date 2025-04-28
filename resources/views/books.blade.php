@extends('layouts.app')

@section('title', 'Livros')

@section('content')
<x-masthead :subHeading="'Livros que Temperam o Conhecimento'" :heading="'Sabores e saberes em cada página'"/>
<div class="container p-5">
    <div class="row">
        <!-- Lista de Livros -->
        <div class="row">
            <h2 class="mb-2 text-center"><i class="fa fa-book"></i> Compre o seu Livro sem sair de casa</h2>
            <div class="p-3">
                <x-filter :categories="$categories" :route="route('book')" :placeholder="'o seu livro'" :person="'Autor'"/>
            </div>
            <div class="row">
                @foreach ($books as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div> <!-- Fim Lista Livros -->
    </div><br><br>

@endsection