@extends('layouts.app')

@section('title', 'Cursos')

@section('subheading', 'Os nossos cursos de culinária')

@section('headingtext', 'São 100% digitais e com um método inovador.')

@section('content')

        <!-- Seção de Cursos -->
        <section class="p-3">
            <div class="container mt-4">
                <div class="container text-center">
                    <h5 class="mb-4 mt-4">
                        <i class="bi bi-chevron-right"></i> <strong>CONHEÇA OS CURSOS E VEJA O QUE VOCÊ VAI APRENDER</strong>
                    </h5>
                    <div class="">
                        <div class="panel card border border-0 mb-3">
                            <form action="{{ route('courses') }}" method="get">
                                <div class="row p-3">
                                    <div class="col-sm-4 mb-1">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="pesquisar por nome...">
                                    </div>
                                    <div class="col-sm-4 mb-1">
                                        <select name="categories" class="form-select form-select-sm">
                                            <option value="" selected>Selecione uma categoria</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-1">
                                        <select name="order_by" class="form-select form-select-sm">
                                            <option value="" selected>Ordenar Por</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mt-2 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary btn-sm">Aplicar Filtros</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (empty($courses))
                        <div class="alert alert-danger">
                            Nenhum Curso foi registado
                        </div>
                    @else
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($courses as $course)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                <img src="{{ asset('assets/img/courses/'.$course->course_photo_path)}}" class="card-img-top" alt="{{ $course->name }}">
                                    <div class="card-body">
                                        <h6 class="text-uppercase fw-bold">{{ $course->name }}</h6>
                                        {{-- <ul class="mt-3">
                                            {{ $course->description }}
                                        </ul> --}}
                                        <p class="text-primary fw-bold mt-3 mb-1">{{ $course->price }} MZN</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <button class="btn btn-info add-to-cart-btn"
                                            data-id="{{ $course->id }}"
                                            data-name="{{ $course->name }}"
                                            data-price="{{ $course->price }}"
                                            data-photo="{{ $course->course_photo_path }}">
                                            <i class="fas fa-shopping-cart me-2"></i> Adicionar ao Carrinho
                                        </button>
                                        <a href="{{ route('courses.details', ['slug' => $course->slug]) }}" class="btn btn-outline-dark">+ Info</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            {{ $courses->links() }}
                        </div>
                    @endif
                </div>
            </div>
    </section><br><br>

    <section class="py-5">
    <div class="container">
        {{-- Título --}}
        <div class="mb-5">
            <h2 class="h4">
                <i class="bi bi-chevron-right"></i> O QUE OS ALUNOS FALAM
            </h2>
        </div>

        {{-- Depoimentos --}}
        <div class="row">
            {{-- Depoimento 1 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"Sempre gostei de ervas e especiarias, mas com o conhecimento aprendido no curso tenho ousado mais..."</p>
                    <h6 class="mt-3 mb-0">FERNANDA MELO</h6>
                    <small>aluna do curso Aprenda a temperar com ervas e especiarias</small>
                </div>
            </div>

            {{-- Depoimento 2 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"Curso bastante informativo e bem estruturado, gostei principalmente dos infográficos e do caderno..."</p>
                    <h6 class="mt-3 mb-0">RAFAEL BATISTA</h6>
                    <small>aluno do curso Aprenda a temperar com ervas e especiarias</small>
                </div>
            </div>

            {{-- Depoimento 3 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"O curso é muito bom, adorei. Aprendi e descobri novos sabores e técnicas. Recomendo."</p>
                    <h6 class="mt-3 mb-0">CELIA TIMOTHEO</h6>
                    <small>aluna do curso Aprenda a temperar com ervas e especiarias</small>
                </div>
            </div>

            {{-- Depoimento 4 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"Esse curso é espetacular! Aprendi muitas coisas que já estou colocando em prática."</p>
                    <h6 class="mt-3 mb-0">DANI VELOSO</h6>
                    <small>aluna do curso Pê-efe saudável: uma fórmula descomplicada para resolver a alimentação</small>
                </div>
            </div>

            {{-- Depoimento 5 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"Sou estudante de nutrição e gostei muito da didática da Rita..."</p>
                    <h6 class="mt-3 mb-0">AMANDA LUIZA</h6>
                    <small>aluna do curso Pê-efe saudável: uma fórmula descomplicada para resolver a alimentação</small>
                </div>
            </div>

            {{-- Depoimento 6 --}}
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <p class="quote">"Fiz o primeiro curso e amei. Aprendi muito. Estou craque em ervas e especiarias. Façam que vocês vão amar!"</p>
                    <h6 class="mt-3 mb-0">MARGARETH CASSAR</h6>
                    <small>aluna do curso Aprenda a temperar com ervas e especiarias</small>
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
</section>


@endsection
