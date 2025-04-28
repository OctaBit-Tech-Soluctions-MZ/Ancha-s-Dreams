@extends('layouts.admin')

@section('title', 'Administradores | Admin')

@section('content')

        <div class="p-3">
            <div class="d-flex gap-3">
                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2 mb-2"
                    href="{{route('admin.users.register')}}">
                    <span class="icon-reverse-wrapper g-2">
                        <span class="btn-text ms-1 me-1">Novo Admin</span>
                        <span class="btn-icon">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="btn-icon">
                            <i class="fas fa-plus-square"></i>
                        </span>
                    </span>
                </a>
                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2 mb-2"
                    href="{{route('admin.instructor.register')}}">
                    <span class="icon-reverse-wrapper g-2">
                        <span class="btn-text ms-1 me-1">Novo Instrutor</span>
                        <span class="btn-icon">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="btn-icon">
                            <i class="fas fa-plus-square"></i>
                        </span>
                    </span>
                </a> 
            </div>
            <x-show-alert/>    
            @if (count($users) == 0 && $search)
                <div class="p-3 text-center">
                    nao foi possivel encontrar um administrador com {{ $search }} <a href="{{ route('admin.users') }}">Ver todos Cursos</a>
                </div>
                @elseif (count($users) == 0)
                    <div class="p-3">
                        <div class="alert alert-danger">
                            Nenhum Administrador alem de voce foi registado
                        </div>
                    </div>
                @else
                    <x-modern-table :title="'Lista de Utilizadores'">
                        <x-slot:header>
                            <tr>
                                <th>#</th>
                                <th>Nome Completo</th>
                                <th>Acesso</th>
                                <td>Permissões</td>
                                <th>Email</th>
                                <th>Acção</th>
                            </tr>
                        </x-slot:header>
                            @foreach ($users as $user)
                                <tr class="border border-0">
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td>{{ $user->name. ' '. $user->surname }}</td>
                                    <td class="text-capitalize">
                                        <span class="rbt-badge-5 bg-color-primary-opacity color-primary">    
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </span>
                                    </td>
                                    <td></td>
                                    <td> {{ $user->email }}</td>
                                    <td class="d-flex gap-1">
                                        <a class="rbt-badge-5 bg-color-primary-opacity color-primary"  href="{{ route('admin.users.edit', ['slug' => $user->slug]) }}"><i class="fas fa-edit"></i></a>
                                        <a class="rbt-badge-5 bg-color-danger-opacity color-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal" 
                                            data-action="{{ route('admin.users.destroy', ['id' => $user->id]) }}"
                                            ><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                    </x-modern-table>
                        <div class="d-flex justify-content-center p-2">
                            {{-- {{ $users->onEachSide(3)->links() }} --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>


@endsection