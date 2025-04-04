@extends('layouts.profile')

@section('title', 'Registo de Cursos |')

@section('profile-content')

            <div class="panel card shadow border border-0 mb-3 p-3">
                <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Registo de Cursos</h1>
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
                            <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 p-1">
                                        <label for="name" class="form-label fw-bolder">Nome do Curso</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Informe o nome do curso"
                                            :value="old('name')">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="categories" class="form-label fw-bolder">Categoria do Curso</label>
                                        <select name="categories" id="categories" class="form-select">
                                            <option value="" selected>Selecione a categoria do curso</option>
                                            @foreach ($categories as $category)    
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="price" class="form-label fw-bolder">Preço do Curso</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="Informe o preço do curso em metical"
                                            :value="old('price')">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="description" class="form-label fw-bolder">Descrição do Curso</label>
                                        <textarea name="description" id="description" cols="30" rows="10" 
                                            placeholder="Descreva o curso" class="form-control"
                                            :value="old('description')" ></textarea>
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="course_photo" class="form-label fw-bolder">Escolha uma Imagem para Representar o Curso</label>
                                        <input type="file" name="course_photo" id="course_photo" class="form-control">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <button type="submit" class="btn btn-primary fw-bolder">Registar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection