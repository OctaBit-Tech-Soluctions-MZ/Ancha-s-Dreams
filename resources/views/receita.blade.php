@extends('layouts.app')

@section('title', 'Receitas Sofisticadas')

@section('subheading', 'Receitas que Inspiram Sabores')

@section('headingtext', 'Explore, cozinhe e surpreenda no sabor!')

@section('content')
<div class="container py-5">
  <h1 class="mb-5 text-center">Receitas Sofisticadas</h1>

  <!-- Sessão 1: Pratos Principais -->
  <div class="mb-5">
    <h2 class="text-center mb-4">Pratos Principais</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
            <img src="{{ asset('assets/img/bk-3963-livro-15-02-9072.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Fettuccine Alfredo</h5>
            <p class="card-text">Um clássico italiano com molho cremoso e toque de noz-moscada.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/bk-2088-pe-efe-tradicional-com-coxa-de-frango-assada-3.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Filé Mignon ao Vinho</h5>
            <p class="card-text">Carne suculenta servida com molho de vinho tinto e ervas frescas.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/bk-2105-jw-9905.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Salmão Grelhado</h5>
            <p class="card-text">Salmão ao ponto com crosta de ervas finas e limão siciliano.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sessão 2: Entradas -->
  <div class="mb-5">
    <h2 class="text-center mb-4">Entradas</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/migas.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Bruschetta Clássica</h5>
            <p class="card-text">Pão italiano crocante com tomate, manjericão e azeite.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/baca.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Creme de Abóbora</h5>
            <p class="card-text">Sopa cremosa com gengibre e um toque de leite de coco.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/tortilha.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Salada Caprese</h5>
            <p class="card-text">Combinação leve de tomate, muçarela de búfala e manjericão.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sessão 3: Sobremesas -->
  <div>
    <h2 class="text-center mb-4">Sobremesas</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/Tarte.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Tarte de Frutas Vermelhas</h5>
            <p class="card-text">Base crocante com recheio cremoso e frutas frescas da estação.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/Bolo.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Bolo de Chocolate Belga</h5>
            <p class="card-text">Camadas de bolo ultra macio com ganache de chocolate intenso.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <img src="{{ asset('assets/img/maionese.webp') }}" class="card-img-top" alt="Curso 1">
          <div class="card-body">
            <h5 class="card-title">Panna Cotta com Frutas Tropicais</h5>
            <p class="card-text">Sobremesa italiana leve e cremosa com cobertura de frutas tropicais.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Nossos Livros --}}
        <div class="mt-5">
            <h2 class="h4">
                <i class="bi bi-chevron-right"></i> NOSSOS LIVROS
            </h2>
            <div class="row text-center mt-4">
                <div class="col-6 col-md-2 mb-4">
                <img src="{{ asset('assets/img/bk-2545-novo-projeto-28.webp') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">Panelinha</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <img src="{{ asset('assets/img/fotor_2023-4-16_9_15_5-768x1311.png') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">Cozinha a quatro mãos</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <img src="{{ asset('assets/img/Sabores-e-E2-1-1536x1536.jpg') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">Direto ao pão</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <img src="{{ asset('assets/img/Tsokosta-expo22-copiar-1536x1536.jpg') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">Comida de bebê</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <img src="{{ asset('assets/img/Tsokosta-Sorvettes02-1-1536x1536.jpg') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">O que tem na geladeira?</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <img src="{{ asset('assets/img/Tsokosta-Panificacao-1536x1024.jpg') }}" class="card-img-top" alt="Curso 1">
                    <p class="small">Rita, Help!</p>
                </div>
            </div>
        </div>

</div>


@endsection
