@extends('layouts.app')

@section('title', 'Cursos')
 
@section('content')

        <!-- Seção de Cursos -->
        <section class="p-3">
            <div class="container mt-4">
                <div class="container text-center">
                    <h2 class="fw-bold">Os <span class="text-success">nossos cursos</span> de culinária</h2>
                    <p class="text-muted">São 100% digitais e com um método inovador.</p>
                    
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
                                <div class="col-md-4 p-2 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary btn-tx"><span class="me-1">Pesquisar</span><i class="fas fa-search"></i></button>
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
                                    <img src="{{ asset($course->course_photo_path)}}" class="card-img-top" alt="{{ $course->name }}">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">{{ $course->name }}</h4>
                                        {{-- <p class="card-text">{{ $course->description }}</p> --}}
                                        <div class="d-flex justify-content-center align-items-center row p-2">
                                            <span class="fw-bold text-success">{{ $course->price }} MZN</span>
                                            <a href="{{ route('courses.details', ['id' => $course->course_id]) }}" class="btn btn-success mt-1">Mais Detalhes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link bg-primary text-white" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link bg-primary text-white" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link bg-primary text-white" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link bg-primary text-white" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link bg-primary text-white" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </section>


@endsection