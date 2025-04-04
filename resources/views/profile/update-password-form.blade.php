@extends('layouts.profile')

@section('title', 'Mudar Senha |')

@section('profile-content')

            <div class="panel card shadow border border-0 mb-3 p-3">
                <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Mudança de Senha</h1>
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
                            <form method="post" action="{{ route('profile.password.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="row p-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 p-1">
                                        <label for="oldPassowrd" class="form-label fw-bolder">Senha Actual</label>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                            placeholder="Informe a senha actual">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="password" class="form-label fw-bolder">Nova Senha</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Informe a nova senha">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="password_confirmation" class="form-label fw-bolder">Confirmação da Senha</label>
                                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" 
                                            class="form-control" placeholder="Informe de novo a nova senha">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <button type="submit" class="btn btn-primary fw-bolder">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection