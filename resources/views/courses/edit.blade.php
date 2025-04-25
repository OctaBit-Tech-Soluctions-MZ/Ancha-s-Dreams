@extends('layouts.instructor')

@section('title', 'Edição do Curso: '.$course->name)

@section('content')

<x-back-button :page="'Formulario de Edição de cursos'" />
<div class="p-4">
    {{-- Alert blade component --}}
    <x-show-alert/>
    <form class="rbt-main-wrapper p-2" method="POST" action="{{ route('instructor.courses.update', ['slug' => $course->slug ]) }}" 
                enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="rbt-create-course-area rbt-section-gap">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-12">
                        <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                            <div class="accordion" id="tutionaccordionExamplea1">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne" aria-expanded="true" aria-controls="accCollapseOne">
                                            Informações do curso
                                        </button>
                                    </h2>
                                    <div id="accCollapseOne" class="accordion-collapse collapse show" aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1" style="">
                                        <div class="accordion-body card-body">
                                            <!-- Start Course Field Wrapper  -->
                                            <div class="rbt-course-field-wrapper rbt-default-form">
                                                <div class="course-field mb--15">
                                                    <label for="field-1">Titulo do Curso</label>
                                                    <input id="field-1" type="text" placeholder="Novo Curso" name="name" value="{{ $course->name }}">
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="aboutCourse">Sobre o curso</label>
                                                    <textarea id="aboutCourse" rows="10" name="description" placeholder="Descreva o curso">{{ $course->description }}</textarea>
                                                </div>

                                                <div class="course-field mb--15 edu-bg-gray">
                                                    <h6>Configurações do curso</h6>
                                                    <div class="rbt-course-settings-content">
                                                        <div class="row g-5">
                                                            <div class="col-lg-4">
                                                                <div class="advance-tab-button advance-tab-button-1">
                                                                    <ul class="rbt-default-tab-button list-unstyled">
                                                                        <li class="p-2" role="presentation">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade advance-tab-content-1 active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                                                        {{-- <div class="course-field mb--20">
                                                                            <label for="field-3">Maximum
                                                                                Students</label>
                                                                            <div class="pro-quantity">
                                                                                <div class="pro-qty m-0"><span class="dec qtybtn">-</span><input id="field-3" type="text" value="100"><span class="inc qtybtn">+</span></div>
                                                                            </div>
                                                                        </div> --}}

                                                                        <div class="course-field mb--20">
                                                                            <label for="field-3">Selecione o nivel de dificuldade</label>
                                                                            <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                                                                <div class="dropdown bootstrap-select w-100 dropup">
                                                                                    <select class="w-100" id="field-5" tabindex="null" name="nivel">
                                                                                        <option value="" disabled="disabled">Selecione o nivel de dificuldade</option>
                                                                                        <option value="profissional" {{ $course->nivel == 'profissional' ? 'selected="select"' : "" }}>Profissional</option>
                                                                                        <option value="intermediario" {{ $course->nivel == 'intermediario' ? 'selected="select"' : "" }}>Intermediario</option>
                                                                                        <option value="iniciante" {{ $course->nivel == 'iniciante' ? 'selected="select"' : "" }}>Iniciante</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--15 edu-bg-gray">
                                                    <h6>Preço do Curso</h6>
                                                    <div class="rbt-course-settings-content">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="advance-tab-button advance-tab-button-1">
                                                                    <ul class="rbt-default-tab-button list-unstyled" id="coursePrice" role="tablist">
                                                                        <li class="w-100" role="presentation">
                                                                        
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="tab-content">

                                                                    <div class="tab-pane fade advance-tab-content-1 active show" id="paid" role="tabpanel" aria-labelledby="paid-tab">

                                                                        <div class="course-field mb--15">
                                                                            <label for="regularPrice-1">Preço Normal
                                                                                (mzn)</label>
                                                                            <input id="regularPrice-1" name="price" type="number" value="{{ $course->price }}" placeholder="mzn preço normal">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--20">
                                                    <h6>Escolha a Categoria</h6>
                                                    <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                                        <div class="dropdown bootstrap-select w-100 dropup">
                                                            <select class="w-100" id="field-5" tabindex="null" name="categories">
                                                                <option value="" disabled>Selecione a categoria do curso</option>
                                                                @foreach ($categories as $category)    
                                                                    <option value="{{ $category->name }}" {{ $category->name == $course->category ? 'selected="select"' : '"" '}}>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--20">
                                                    <h6>Capa do Curso</h6>
                                                    <div class="rbt-create-course-thumbnail upload-area">
                                                        <div class="upload-area">
                                                            <div class="brows-file-wrapper" data-black-overlay="9">
                                                                <!-- actual upload which is hidden -->
                                                                <input name="course_photo" id="createinputfile" type="file" class="inputfile">
                                                                <img id="createfileImage" src="{{ asset('assets/img/courses/'.$course->course_photo_path) }}" alt="file image">
                                                                <!-- our custom upload button -->
                                                                <label class="d-flex" for="createinputfile" title="Ficheiro nenhum escolhido">
                                                                    <i class="fas fa-upload"></i>
                                                                    <span class="text-center">Escolha a Capa do Curso</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <small><i class="feather-info"></i> <b>Size:</b> 700x430 pixels,
                                                        <b>File
                                                            Support:</b> JPG, JPEG, PNG, GIF, WEBP</small>
                                                </div>


                                            </div>
                                            <!-- End Course Field Wrapper  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt--10 row g-5">
                            <div class="col-lg-12">
                                <button type="submit" class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Editar Curso</span>
                                        <span class="btn-icon ms-1"><i class="fas fa-arrow-right"></i></span>
                                        <span class="btn-icon me-1"><i class="fas fa-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection