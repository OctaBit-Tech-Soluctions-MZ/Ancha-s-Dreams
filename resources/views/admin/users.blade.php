@extends('layouts.admin')

@section('title', 'Administradores | Admin')

@section('page', 'Listagem de Adminastradores')

@section('content')

        
        <div class="ps-3 pe-3">
            <div class="panel card shadow border border-0">
                <form action="{{ route('admin.users') }}" method="get">
                    <div class="row p-3">
                        <div class="col-sm-5 mb-1">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="pesquisar por nome...">
                        </div>
                        <div class="col-sm-5 mb-1">
                            <select name="order_by" class="form-select form-select-sm">
                                <option value="" selected>Ordenar Por</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-sm">Aplicar Filtros</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
            @if(session('success'))
                <div class="p-4">
                    <div class="alert alert-success m-2">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4">
                    <div class="alert alert-danger m-2">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        <div class="p-3">
            <div class="panel card shadow border border-0">
                <!-- DataTales Example -->
                <div class="panel-body bio-graph-info p-1">
                    <div class="d-flex justify-content-start p-3">
                        <a href="{{ route('admin.users.register') }}" class="btn btn-success btn-sm">Registar Administrador</a>
                    </div>     
                    @if (count($users) == 0 && $search)
                        <div class="p-3 text-center">
                            nao foi possivel encontrar um utilizador com {{ $search }} <a href="{{ route('admin.users') }}">Ver todos Cursos</a>
                        </div>
                    @elseif (count($users) == 0)
                        <div class="p-3">
                            <div class="alert alert-danger">
                                Nenhum Administrador alem de voce foi registado
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable">
                                    <thead class="table-dark">
                                        <tr class="border border-0">
                                            <th class="border border-0">#</th>
                                            <th class="border border-0">Nome Completo</th>
                                            <th class="border border-0">Email</th>
                                            <th class="border border-0">Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($users as $user)
                                        <tr class="border border-0">
                                            <td class="border border-0"> {{ $loop->index + 1 }} </td>
                                            <td class="border border-0">
                                                {{ $user->name }}
                                            </td>
                                            <td class="border border-0"> {{ $user->email }}</td>
                                            <td class="border border-0"> 
                                                <a class="btn btn-success btn-sm mt-1"  href="{{ route('admin.users.edit', ['slug' => $user->slug]) }}"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm mt-1" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal" 
                                                    data-action="{{ route('admin.users.destroy', ['id' => $user->id]) }}"
                                                    ><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-2">
                            {{-- {{ $users->onEachSide(3)->links() }} --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>


@endsection