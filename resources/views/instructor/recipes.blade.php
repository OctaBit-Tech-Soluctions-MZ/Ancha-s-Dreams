@extends('layouts.instructor')

@section('title', 'Lista de Receitas')

@section('content')
<div class="p-4">
    <x-show-alert/>
    <div class="p-2">
        <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
            href="{{route('instructor.recipes.register')}}">
            <span class="icon-reverse-wrapper g-2">
                <span class="btn-text ms-1 me-1">Nova Receita</span>
                <span class="btn-icon">
                    <i class="fas fa-plus-square"></i>
                </span>
                <span class="btn-icon">
                    <i class="fas fa-plus-square"></i>
                </span>
            </span>
        </a>
    </div>
    <x-modern-table :title="'Lista de Receitas'">
        <x-slot:header>
            <tr>
                <th></th>
                <th>Nome da Receita</th>
                <th>Tempo de Preparo</th>
                <th>Categoria</th>
                <th>Associada a um Curso?</th>
                <th>Acções</th>
            </tr>
        </x-slot:header>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->preparation_time }}</td>
                    <td>{{ $recipe->category }}</td>
                    <td class="text-center text-capitalize">
                        {!! $recipe->is_associate_course ? '<span class="rbt-badge-5 bg-color-success-opacity color-success">sim</span>' 
                                                        : '<span class="rbt-badge-5 bg-color-danger-opacity color-danger">não</span>' !!}
                    </td>
                    <td class="d-flex gap-1">
                        <a href="" class="rbt-badge-5 bg-color-primary-opacity color-primary" title="Ver mais"><i class="feather-eye"></i></a>
                        <a href="{{ route('instructor.recipes.edit', ['slug' => $recipe->slug]) }}" class="rbt-badge-5 bg-color-primary-opacity color-primary" title="Editar"><i class="feather-edit"></i></a>
                        <a href="#" role="button" class="rbt-badge-5 bg-color-danger-opacity color-danger" title="Remover"
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            data-action="{{ route('recipes.delete', ['slug' => $recipe->slug]) }}"><i class="feather-trash"></i></a>
                    </td>
                </tr>
            @endforeach
    </x-modern-table>
</div>

@endsection