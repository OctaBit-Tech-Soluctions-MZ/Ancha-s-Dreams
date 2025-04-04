@extends('layouts.app')

@section('title', 'Cursos')
 
@section('content')

        <!-- Seção de Cursos -->
        <section class="p-3">
            <div class="container mt-4">
                <div class="container text-center">
                    <h2 class="fw-bold">Os <span class="text-success">nossos cursos</span> de culinária</h2>
                    <p class="text-muted">São 100% digitais e com um método inovador.</p>
                    
                    <div class="">
                        <div class="panel card shadow border border-0 mb-3">
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
                        <div class="row mt-4">
                        @foreach ($courses as $course)
                            <div class="col-md-3 p-2">
                                <div class="card">
                                    <img src="{{ asset('assets/img/courses/'.$course->course_photo_path)}}" class="card-img-top" alt="{{ $course->name }}">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">{{ $course->name }}</h4>
                                        {{-- <p class="card-text">{{ $course->description }}</p> --}}
                                        <div class="d-flex justify-content-center align-items-center row p-2">
                                            <span class="fw-bold text-success">{{ $course->price }} MZN</span>
                                            <a href="{{ route('courses.details', ['slug' => $course->slug]) }}" class="btn btn-success mt-1">Mais Detalhes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="d-flex justify-content-center p-2">
                            {{ $courses->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </section>


@endsection