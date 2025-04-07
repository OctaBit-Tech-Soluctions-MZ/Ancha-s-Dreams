@extends('layouts.profile')

@section('title', 'Adicionando uma video aula')

@section('profile-content')

            <div class="panel card shadow border border-0 mb-3 p-3">
                <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Registo de Video Aulas</h1>
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
                            <form method="post" action="{{ route('courses.lesson.store',['slug' => $slug]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 p-1">
                                        <label for="title" class="form-label fw-bolder">Titulo da Video Aula</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Informe o titulo da video aula"
                                            :value="old('title')">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="description" class="form-label fw-bolder">Descrição da video aula</label>
                                        <textarea name="description" id="description" cols="30" rows="10" 
                                            placeholder="Descreva a aula (um sinopse por exemplo)" class="form-control"
                                            :value="old('description')" ></textarea>
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <label for="lesson_video_path" class="form-label fw-bolder">Selecione a video aula</label>
                                        <input type="file" name="lesson_video_path" id="lesson_video_path" class="form-control">
                                    </div>
                                    <div class="col-sm-12 p-1">
                                        <button type="submit" class="btn btn-primary btn-sm p-2">Adicionar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection