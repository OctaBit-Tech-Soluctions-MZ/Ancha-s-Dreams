@extends('layouts.admin')

@section('title', 'Registar Administrador | Admin')

@section('content')
    <div class="p-4">
        <div class="panel card shadow-sm border border-0 mb-3 p-3">
            <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Registo de Administradores</h1>
        </div>
        <div class="panel card shadow-sm border border-0">
            <div class="panel-body bio-graph-info p-3">
                <div class="card-body">
                    @if($errors->any())
                        <div style="color:red">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Primeiros Nomes</label>
                            <input type="text" class="form-control" placeholder="informe os primeiros nomes do administrador" id="name"
                                name="name" :value="old('name')">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="surname">Apelido</label>
                            <input type="text" class="form-control" id="surname" 
                            placeholder="informe o apelido do novo administrador" name="surname" :value="old('surname')">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" placeholder="informe o email do novo administrador" id="email"
                                name="email" :value="old('email')">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone_number" >Numero de Telefone</label>
                            <input type="text" class="form-control" placeholder="informe o numero de telefone do novo administrador"
                                 id="phone_number" name="phone_number" :value="old('phone_number')">
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary btn-sm" type="submit">
                                {{ __('Registar Administrador') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection