@extends('layouts.instructor')

@section('title', 'Dashboard')

@section('content')


<div class="p-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger card_dash shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total de Cursos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courses->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-certificate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger card_dash shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total de Aulas</div>
                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">1{{ $courses->contents->count() }}</div> --}}
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-certificate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection