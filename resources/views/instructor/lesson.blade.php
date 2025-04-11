@extends('layouts.instructor')

@section('title','Video Aulas')

@section('page','Lista de Video Aulas')

@section('content')

        <div class="panel card shadow border border-0">
            <div class="d-flex justify-content-start p-3">
                <a href="{{ route('instructor.courses.lesson.add', ['slug' => $slug]) }}" class="btn btn-success btn-sm">Adicionar Aula</a>
            </div>
            <div class="panel-body bio-graph-info p-1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable">
                            <thead class="table-dark">
                                <tr class="border border-0">
                                    <th class="border border-0">#</th>
                                    <th class="border border-0">Titulo da Aula</th>
                                    <th class="border border-0">Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $loop->index + 1}} </td>
                                        <td>{{ $content->title }} </td>
                                        <td class="border border-0"> 
                                            <a class="btn btn-success btn-sm mt-1"  href=""><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm mt-1" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal" 
                                                data-action=""
                                                ><i class="fas fa-trash"></i></button>
                                        </td>
                                @endforeach
        </div>


@endsection