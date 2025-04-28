@extends('layouts.instructor')

@section('title', 'Adicionando uma Receita')

@section('content')

<x-back-button :page="'Formulario de Registo de Receitas'"/>
<div>
    <div class="p-3">
            <x-show-alert/>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="modal-title mb--20" id="LessonLabel">Adicionar Nova Receita</h5>
                    <form method="POST" action="{{ route('instructor.recipes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="course-field mb--20">
                            <label for="modal-field-1">Nome da Receita</label>
                            <input id="modal-field-1" type="text" name="title">
                            <small>
                                <i class="feather-info"></i> Os nomes das receitas são exibidos publicamente sempre que necessário.
                            </small>
                        </div>
                        <div class="course-field mb--20">
                            <h6>Escolha a Categoria</h6>
                            <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                <div class="dropdown bootstrap-select w-100 dropup">
                                    <select class="w-100" id="field-5" tabindex="null" name="categories">
                                        <option value="" disabled>Selecione a categoria do curso</option>
                                        @foreach ($categories as $category)    
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="course-field mb--20">
                            <label for="field-3">Rendimento</label>
                            <div class="pro-quantity">
                                <div class="pro-qty m-0">
                                    <span class="dec qtybtn">-</span>
                                    <input id="field-3" type="text" value="2" name="rendimento">
                                    <span class="inc qtybtn">+</span>
                                </div>
                                <small>
                                    <i class="feather-info"></i> Informe quantas pessoas podem se deliciar desse prato.
                                </small>
                            </div>
                        </div>
                        <div class="course-field mb--20">
                            <label for="editor">Modo de Preparo</label>
                            <textarea id="editor" name="preparation_method"></textarea>
                            <br>
                            <small>
                                <i class="feather-info"></i> Adicione um texto sobre os Ingredientes e passos a seguir nesta receita.
                            </small>
                        </div>
                        <div class="course-field mb--20">
                            <label for="modal-field-3">Tempo de preparo</label>
                            <div class="d-flex gap-2 mt--20">
                                <div class="col-sm-2">
                                    <input class="mb-0" id="modal-field-3" type="number" value="0" name="preparation_time">
                                </div>
                                <div class="col-sm-2">
                                    <div class="rbt-modern-select bg-transparent w-100">
                                        <div class="dropdown bootstrap-select w-100">
                                            <select class="w-100"name='time'>
                                                <option selected="selected" value="minutos">Minutos</option>
                                                <option value="horas">Horas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <small><i class="feather-info"></i> Time limit for this quiz.
                                0 means no time limit.</small>
                        </div>
                        <div class="course-field mb--20">
                            <h6>Image da Receita</h6>
                            <div class="rbt-create-course-thumbnail upload-area">
                                <div class="upload-area">
                                    <div class="brows-file-wrapper" data-black-overlay="9">
                                        <!-- actual upload which is hidden -->
                                        <input name="image" id="createinputfile" type="file" class="inputfile">
                                        <img id="createfileImage" src="{{ asset('assets/img/thumbnail-placeholder.svg') }}" alt="file image">
                                        <!-- our custom upload button -->
                                        <label class="d-flex" for="createinputfile" title="Ficheiro nenhum escolhido">
                                            <i class="fas fa-upload"></i>
                                            <span class="text-center">Escolha a Capa do Curso</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <small><i class="feather-info"></i> <b>Tamanho maximo:</b> 2MB,
                                <b>Ficheiros suportados:</b> JPG, JPEG, PNG, GIF, WEBP</small>
                        </div>

                        <div class="pt--30 d-flex justify-content-start">
                            <div class="d-flex justify-content-between w-100 h-25">
                            <button type="submit" class="rbt-btn btn-md">Registar Receita</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection

