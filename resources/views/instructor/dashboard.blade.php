@extends('layouts.instructor')

@section('title', 'Dashboard')

@section('content')

<div class="p-4">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger card_dash shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Meus Cursos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courses->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-certificate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger card_dash shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Minhas Aulas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @php
                                    $content = 0;
                                    foreach ($courses as $course) {
                                        $content = $content + $course->contents->count();
                                    }
                                    echo $content;
                                @endphp
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="feather-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger card_dash shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Minhas Receitas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recipes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger card_dash shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Meus Alunos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 30 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="feather-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-dashboard-content bg-color-white mb--60">
        <div>
            <div class="row gy-5">
                <div class="col-lg-12">
                    <x-modern-table :title="'Meus Cursos'">
                        <x-slot:header>
                            <tr>
                                <th></th>
                                <th>Nome do Curso</th>
                                <th>Inscritos</th>
                                <th>Avaliações</th>
                            </tr>
                        </x-slot:header>
                            @foreach ($courses_list as $course)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ 5 }}</td>
                                    <td>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </x-modern-table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection