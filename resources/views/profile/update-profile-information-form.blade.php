@extends('layouts.profile')

@section('title', 'Editar Dados do Utilizador | '. $user->name)

@section('profile-content')

            <div class="panel card shadow border border-0 mb-3 p-3">
                <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Edição de Dados do Utilizador</h1>
            </div>
                <div class="panel card shadow border border-0">
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
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="row p-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 p-1">
                                        <label for="name" class="form-label fw-bolder">Nome Completo</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Informe o seu nome completo" value="{{ $user->name }}">
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0 p-1">
                                        <label for="email" class="form-label fw-bolder">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Informe o seu email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection