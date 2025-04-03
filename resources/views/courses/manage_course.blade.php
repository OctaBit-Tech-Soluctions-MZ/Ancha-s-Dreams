@extends('layouts.profile')
 
@section('profile-content')

                    <div class="panel card shadow border border-0 mb-3">
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
                    
                    <div class="panel card shadow border border-0">
                        <div class="d-flex justify-content-start p-3">
                            <a href="{{ route('courses.register') }}" class="btn btn-success btn-sm">Registar Curso</a>
                        </div>
                        
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
                        <div class="panel-body bio-graph-info p-3">
                            <div class="card-body">
                                <div class="table-responsive">

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table" id="dataTable">
                                        <thead class="border-0">
                                            <tr>
                                                <th>#</th>
                                                <th>Nome do Curso</th>
                                                <th>Preço do Curso</th>
                                                <th>Acção</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($courses as $course)
                                            <tr>
                                                <td> {{ $loop->index + 1 }} </td>
                                                <td> 
                                                    <img src="{{ asset('assets/img/courses/'.$course->course_photo_path)}}" 
                                                    class="img-sm me-1" alt="{{ $course->name }}"> 
                                                     {{ $course->name }}
                                                </td>
                                                <td> {{ $course->price }} MZN</td>
                                                <td> 
                                                    <a class="btn btn-primary btn-sm m-1"  href="{{ route('profile.courses.details',['slug' => $course->slug]) }}"><i class="fas fa-eye"></i></a>
                                                    <a class="btn btn-danger btn-sm m-1" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal" 
                                                        data-action="{{ route('profile.courses.delete', ['slug' => $course->slug]) }}"
                                                        href="#"><i class="fas fa-trash"></i></a>
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

@endsection