@extends('layouts.instructor')

@section('title', 'Adicionando uma video aula')

@section('content')

<x-back-button :page="'Formulario de Registo de Aulas'"/>
<div>
    <div class="p-5">
            <x-show-alert/>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="modal-title mb--20" id="LessonLabel">Adicionar Nova Aula</h5>
                    <form method="POST" action="{{ route('instructor.lesson.store', ['slug' => $slug]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="course-field mb--20">
                            <label for="modal-field-1">Nome da Aula</label>
                            <input id="modal-field-1" type="text" name="title">
                            <small>
                                <i class="feather-info"></i> Os títulos das aulas são exibidos publicamente sempre que necessário. Cada aula pode conter um ou mais questionários.
                            </small>
                        </div>
                        <div class="course-field mb--20">
                            <label for="modal-field-2">Resumo da Aula</label>
                            <textarea id="modal-field-2" name="description"></textarea>
                            <small>
                                <i class="feather-info"></i> Adicione um resumo de um texto curto
                                para preparar os alunos para as atividades da Aula. O texto é
                                exibido ao lado da dica de ferramenta ao lado do nome da Aula.
                            </small>
                        </div>
                        <div class="course-field mb--15">
                            <label for="videoUrl">Carregue o Video</label>
                            <input id="videoUrl" type="file" class="form-control" name="video">
                            <small class="d-block mt_dec--5">Pode ser a primeira aula ou um video de boas vindas ao curso</a></small>
                        </div>
                        <div class="pt--30 d-flex justify-content-start">
                            <div class="d-flex justify-content-between w-100 h-25">
                            <button type="submit" class="rbt-btn btn-md">Adicionar Aula</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection