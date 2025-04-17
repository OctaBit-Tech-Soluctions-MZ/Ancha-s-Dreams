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
                <div class="shadow p-4">
                    <form action="" method="get" class="row form-filter">
                        <div class="col-md-4 p-2">
                            <input type="text" name="search" id="search" class="form-control" placeholder="pesquise aqui...">
                        </div>
                        <div class="col-md-4 p-2">
                            <select name="category" id="category" class="form-control">
                                <option>Selecione uma categoria</option>
                                <option>Alimentos</option>
                                <option>Açúcar & Adoçantes</option>
                                <option>Alimentos Para Bebês</option>
                                <option>Batata e Cebola</option>
                                <option>Cereais e Farinhas</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <select name="order_by" id="order_by" class="form-control">
                                <option>Ordernar Por</option>
                                <option>A-Z</option>
                                <option>Recentes</option>
                                <option>Populares</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="submit" class="btn btn-primary btn-tx"><span class="me-1">Pesquisar</span><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- Livro 1 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/fotor_2023-4-16_9_15_5-768x1311.png') }}" alt="Livro 1">
                        <div class="card-body">
                            <h5>Panificação e Fast Food</h5>
                            <p class="price">MT 350,00</p>
                            <button class="btn btn-add">Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>
                <!-- Livro 2 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/Sabores-e-E2-1-1536x1536.jpg') }}" alt="Livro 2">
                        <div class="card-body">
                            <h5>Confeitaria Profissional</h5>
                            <p class="price">MT 420,00</p>
                            <button class="btn btn-add">Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>
                <!-- Livro 3 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/Tsokosta-expo22-copiar-1536x1536.jpg') }}" alt="Livro 3">
                        <div class="card-body">
                            <h5>Doces e Sobremesas</h5>
                            <p class="price">MT 280,00</p>
                            <button class="btn btn-add">Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="row">
                <!-- Livro 1 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/IMG_1482-400x400.jpg') }}" alt="Livro 1">
                        <div class="card-body">
                            <h5>Panificação e Fast Food</h5>
                            <p class="price">MT 350,00</p>
                            <button class="btn btn-add">Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>
                <!-- Livro 2 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/Tsokosta-Sorvettes02-1-1536x1536.jpg') }}" alt="Livro 2">
                        <div class="card-body">
                            <h5>Confeitaria Profissional</h5>
                            <p class="price">MT 420,00</p>
                            <button class="btn btn-add">Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>
                <!-- Livro 3 -->
                <div class="col-md-4">
                    <div class="card book-card">
                        <img src="{{ asset('assets/img/Tsokosta-Panificacao-1536x1024.jpg') }}" alt="Livro 3">
                        <div class="card-body">
                            <h5>Doces e Sobremesas</h5>
                            <p class="price">MT 280,00</p>
                            <button class="btn btn-add">Adicionar ao carinho</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Fim Lista Livros -->
    </div><br><br>


@endsection