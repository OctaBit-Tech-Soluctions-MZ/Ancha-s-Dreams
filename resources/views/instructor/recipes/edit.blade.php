@extends('layouts.instructor')

@section('title', 'Editando uma Receita')

@section('content')

<x-back-button :page="'Formulario de Edição de Receitas'"/>
<div>
    <div class="p-5">
            <x-show-alert/>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="modal-title mb--20" id="LessonLabel">Editar Receita</h5>
                    <form method="POST" action="{{ route('instructor.recipes.update', ['slug' => $recipe->slug]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="course-field mb--20">
                            <label for="modal-field-1">Nome da Receita</label>
                            <input id="modal-field-1" type="text" name="title" value="{{ $recipe->title }}">
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
                                            <option value="{{ $category->name }}" 
                                                {{ $category->name == $recipe->category ? 'selected="select"' : ''}}>{{ $category->name }}</option>
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
                                    <input id="field-3" type="text" name="rendimento" value="{{ $recipe->rendimento }}">
                                    <span class="inc qtybtn">+</span>
                                </div>
                                <small>
                                    <i class="feather-info"></i> Informe quantas pessoas podem se deliciar desse prato.
                                </small>
                            </div>
                        </div>
                        <div class="course-field mb--20">
                            <label for="editor">Como Preparar</label>
                            <textarea id="editor" name="preparation_method">{{ $recipe->preparation_method }}</textarea>
                            <small>
                                <i class="feather-info"></i> Adicione um texto sobre os Ingredientes e passos a seguir nesta receita.
                            </small>
                        </div>
                        <div class="course-field mb--20">
                            <label for="modal-field-3">Tempo de preparo</label>
                            <div class="d-flex gap-2 mt--20">
                                {{-- @php
                                    $time = 
                                @endphp --}}
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
                                        <img id="createfileImage" src="{{ asset('assets/img/recipes/'.$recipe->image_path) }}" alt="file image">
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
                            <button type="submit" class="rbt-btn btn-md">Editar Receita</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection

