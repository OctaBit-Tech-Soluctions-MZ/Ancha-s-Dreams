@extends('layouts.admin')

@section('title', 'Cursos | Admin')

@section('content')

<div class="p-3">
        
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
    <x-modern-table :title="'Lista de Cursos'">
        <x-slot:header>
            <tr>
                <th>#</th>
                <th>Nome do Curso</th>
                <th>Instrutor</th>
                <th>Preço do Curso</th>
                <th>Nivel</th>
                <th>Acção</th>
            </tr>
        </x-slot:header>
                            
        @foreach ($courses as $course)
            <tr class="text-capitalize">
                <td> {{ $loop->index + 1 }} </td>
                <td> {{ $course->name }}</td>
                <td> {{ $course->instructor->name }}</td>
                <td> {{ $course->price }} MZN</td>
                <td> {{ $course->nivel }}</td>
                <td class="d-flex gap-1"> 
                    <a class="rbt-badge-5 bg-color-primary-opacity color-primary"  href="{{ route('courses.details',['slug' => $course->slug]) }}"><i class="fas fa-eye"></i></a>
                    <a href="#" role="button" class="rbt-badge-5 bg-color-primary-danger color-danger" 
                        data-bs-toggle="modal" 
                        data-bs-target="#deleteModal" 
                        data-action="{{ route('admin.courses.delete', ['slug' => $course->slug]) }}"
                        ><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </x-modern-table>
            <div class="d-flex justify-content-center p-2">
                {{ $courses->onEachSide(3)->links() }}
            </div>
        </div>
    @endif
</div>


@endsection