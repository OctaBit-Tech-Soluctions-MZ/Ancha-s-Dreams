@extends('layouts.admin')

@section('title', 'Courses | Admin')

@section('page', 'Listagem de Cursos')

@section('content')

<div class="p-3">
    <div class="panel card shadow border border-0">
        <form action="{{ route('profile.courses') }}" method="get">
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

<div class="p-3">
    <div class="panel card shadow border border-0">
        
    @if (count($courses) == 0 && $search)
        <div class="p-3 text-center">
            nao foi possivel encontrar um curso com {{ $search }} <a href="{{ route('courses.teacher') }}">Ver todos Cursos</a>
        </div>
    @elseif (count($courses) == 0)
        <div class="p-3">
            <div class="alert alert-danger">
                Nenhum curso foi registado
            </div>
        </div>
    @else
        <!-- DataTales Example -->
        <div class="panel-body bio-graph-info p-1">
            <div class="card-body">
                <div class="table-responsive">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr class="border border-0">
                                <th class="border border-0">#</th>
                                <th class="border border-0">Nome do Curso</th>
                                <th class="border border-0">Instrutor</th>
                                <th class="border border-0">Preço do Curso</th>
                                <th class="border border-0">Status</th>
                                <th class="border border-0">Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($courses as $course)
                            <tr class="border border-0">
                                <td class="border border-0"> {{ $loop->index + 1 }} </td>
                                <td class="border border-0"> 
                                    <img src="{{ asset('assets/img/courses/'.$course->course_photo_path)}}" 
                                    class="img-sm me-1" alt="{{ $course->name }}"> 
                                    {{ $course->name }}
                                </td>
                                <td class="border border-0"> {{ $course->instructor->name }}</td>
                                <td class="border border-0"> {{ $course->price }} MZN</td>
                                <td class="border border-0"> {{ $course->status }}</td>
                                <td class="border border-0"> 
                                    <a class="btn btn-success btn-sm mt-1"  href="{{ route('admin.courses.details',['slug' => $course->slug]) }}"><i class="fas fa-eye"></i></a>
                                    <button class="btn btn-danger btn-sm mt-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-action="{{ route('admin.courses.delete', ['slug' => $course->slug]) }}"
                                        ><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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