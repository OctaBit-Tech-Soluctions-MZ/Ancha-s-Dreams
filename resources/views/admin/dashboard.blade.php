@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow card_dash h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Alunos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                Instrutores</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $instructors }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
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
                                Cursos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courses }}</div>
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
                                Livros</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $books }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<x-modern-table :title="'Historico de Pedidos'">
    <x-slot:header>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Items</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Acção</th>
        </tr>
    </x-slot:header>
    <tr>
        <td><span>#P5HSHBC877</span></td>
        <td><span>Huren Vicente Pelembe</span></td>
        <td><span>1 - Cursos de Culinaria X<br>
                                    2 - Livro X<br>
                                    3 - Utilisilio X </span>
        </td>
        <td><span> 4000 Mzn</span></td>
        <td><span class="rbt-badge-5 bg-primary-opacity">Em Processo</span></td>
        <td>
            <form method="POST" action="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2" id="statusForm">
                @csrf
                @method('PUT')
            
                <input type="checkbox" name="check" id="check" class="d-none">
                <input type="checkbox" name="cancel" id="cancel" class="d-none">
            
                <button type="button" class="btn btn-success btn-sm" onclick="submitWithCheck('check')">
                    <i class="fa fa-check"></i> Aprovar
                </button>
            
                <button type="button" class="btn btn-danger btn-sm" onclick="submitWithCheck('cancel')">
                    <i class="fa fa-times"></i> Cancelar
                </button>
            </form>
        
        </td>
    </tr>
</x-modern-table>

@endsection