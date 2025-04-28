@extends('layouts.admin')

@section('title', 'Registar Instrutor | Admin')

@section('content')
    <div class="p-4">
        <div class="panel card shadow-sm border border-0 mb-3 p-3">
            <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Registo de Instrutores</h1>
        </div>
        <div class="panel card shadow-sm border border-0" style="font-size: 14px;">
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
                    
                    <form method="POST" action="{{ route('admin.instructor.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bolder" for="name">Primeiros Nomes</label>
                                <input type="text" class="form-control" placeholder="informe o nome do instrutor"
                                 id="name" name="name" :value="old('name')">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="surname" class="form-label fw-bolder">Apelido</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                placeholder="informe o apelido do instrutor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bolder" for="email">E-mail</label>
                                <input type="text" class="form-control" placeholder="informe o email do instrutor" id="email"
                                    name="email" :value="old('email')">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="phone_number" class="form-label fw-bolder">Número de telefone</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="informe o numero de telefone do instrutor" :value="old('phone_number')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="specialty" class="form-label fw-bolder">Especialidade culinária</label>
                                <select name="specialty" id="specialty" class="form-select">
                                    <option value="">Selecione a Especialidade do Instrutor</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="experience" class="form-label fw-bolder">Anos de Experiência</label>
                                <input type="text" name="experience" id="experience"  class="form-control"
                                    placeholder="informe os anos de experiência do instrutor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label for="biography" class="form-label fw-bolder">Biografia (mini-curriculo)</label>
                                <input type="hidden" id="biography" name="biography">
                                <trix-editor input="biography"></trix-editor>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="certificate" class="form-label fw-bolder">Certificações (opcional)</label>
                                <input type="hidden" name="certificate" id="certificate">
                                <trix-editor input="certificate"></trix-editor>
                            </div>
                        </div>
                        <input type="hidden" name="role" value="instructor">
                        <div class="mt-4">
                            <button class="btn btn-primary btn-sm" type="submit">
                                {{ __('Registar Instrutor') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection