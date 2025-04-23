@extends('layouts.instructor')

@section('title', 'Meus Cursos | '.Auth::user()->name)

@section('page', 'Meus Cursos')
 
@section('content')
                <div class="p-3">
                    <div class="panel card shadow border border-0 mb-3">
                        <form action="{{ route('instructor.courses') }}" method="get">
                            <div class="row p-3">
                                <div class="col-sm-4 mb-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="pesquisar por nome...">
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <select name="category" class="form-select form-select-sm">
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
                                <div class="col-sm-4 mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Aplicar Filtros</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success m-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger m-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-start p-4">
                        <a href="{{ route('instructor.courses.register') }}" class="btn btn-success btn-sm">Registar Curso</a>
                    </div>
                    
                    <div class="p-3">
                        
                    @if (count($courses) == 0 && $search)
                        <div class="p-3 text-center">
                            nao foi possivel encontrar um curso com {{ $search }} <a href="{{ route('instructor.courses') }}">Ver todos Cursos</a>
                        </div>
                    @elseif (count($courses) == 0)
                        <div class="p-3">
                            <div class="alert alert-danger">
                                Nenhum curso foi registado
                            </div>
                        </div>
                    @else
                        <!-- DataTales Example -->
                        <div class="panel-body bio-graph-info">
                            <div class="card-body">
                                <div class="d-flex gap-2">

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                        
                                    <div class="row g-5">
                                        {{-- Course Card Blade Component. resources/components/course-card-instructor.blade.php --}}
                                        <x-course-card-instructor :courses="$courses"  />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                {{ $courses->onEachSide(3)->links() }}
                            </div>
                        </div>
                    @endif
                    </div>
                </div>

@endsection