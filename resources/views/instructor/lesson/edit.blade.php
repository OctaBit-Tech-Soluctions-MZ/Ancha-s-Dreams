@extends('layouts.instructor')

@section('title', 'Editando uma video aula')

@section('content')

{{-- <x-back-button :page="'Formulario de Edição de Aulas'"/> --}}
<div>
    <div class="p-5">
            <x-show-alert/>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="modal-title mb--20" id="LessonLabel">Editar Aula</h5>
                    <form method="POST" action="{{ route('instructor.lesson.update', ['slug' => $content->slug]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="course-field mb--20">
                            <label for="modal-field-1">Nome da Aula</label>
                            <input id="modal-field-1" type="text" name="title" value="{{$content->title}}">
                            <small>
                                <i class="feather-info"></i> Os títulos das aulas são exibidos publicamente sempre que necessário. Cada aula pode conter um ou mais questionários.
                            </small>
                        </div>
                        <div class="course-field mb--20">
                            <label for="modal-field-2">Resumo da Aula</label>
                            <textarea id="modal-field-2" name="description">{{$content->description}}</textarea>
                            <small>
                                <i class="feather-info"></i> Adicione um resumo de um texto curto
                                para preparar os alunos para as atividades da Aula. O texto é
                                exibido ao lado da dica de ferramenta ao lado do nome da Aula.
                            </small>
                        </div>
                        <div class="course-field mb--15">
                            <label for="videoUrl">Carregue o Video</label>
                            <input id="videoUrl" type="file" class="form-control" name="video">
                            <div class="row p-2">
                                <div class="p-2"><small>Pode ser a primeira aula ou um video de boas vindas ao curso</a></small></div>
                                <div><iframe src="{{$content->url_preview}}" frameborder="0" class="w-100 h-100"></iframe></div>
                            </div>
                                
                                
                        </div>
                        <div class="pt--30 d-flex justify-content-start">
                            <div class="d-flex justify-content-between w-100 h-25">
                            <button type="submit" class="rbt-btn btn-md">Actualizar Aula</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection