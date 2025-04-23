@extends('layouts.instructor')

@section('title', 'Registar Curso')

@section('content')

<div class="p-4">
    {{-- Alert blade component --}}
    <x-show-alert/>
    <form class="rbt-main-wrapper p-2" method="POST" action="{{ route('instructor.courses.store') }}" 
                enctype="multipart/form-data">
        @csrf
        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
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
                                                    <input id="field-1" type="text" placeholder="Novo Curso" name="name">
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="aboutCourse">Sobre o curso</label>
                                                    <textarea id="aboutCourse" rows="10" name="description"></textarea>
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
                                                                                        <option value="profissional">Profissional</option>
                                                                                        <option value="intermediario">Intermediario</option>
                                                                                        <option value="iniciante" selected="selected">Iniciante</option>
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
                                                                            <input id="regularPrice-1" name="price" type="number" placeholder="mzn preço normal">
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
                                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                                                                <img id="createfileImage" src="{{ asset('assets/img/thumbnail-placeholder.svg') }}" alt="file image">
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

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseTwo" aria-expanded="false" aria-controls="accCollapseTwo">
                                            Video de Introdução ao Curso
                                        </button>
                                    </h2>
                                    <div id="accCollapseTwo" class="accordion-collapse collapse" aria-labelledby="accTwo" data-bs-parent="#tutionaccordionExamplea1" style="">
                                        <div class="accordion-body card-body rbt-course-field-wrapper rbt-default-form">

                                            <div class="course-field mb--20">
                                                <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                                    <div class="dropdown bootstrap-select w-100 dropup"><select class="w-100" id="field-5" tabindex="null">
                                                        <option value="" disabled="disabled">Select Video Sources</option>
                                                        <option value="youtube">Youtube</option>
                                                        <option value="vimeo">Vimeo</option>
                                                        <option value="local" selected="selected">Local</option>
                                                    </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Local" data-id="field-5"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Local</div></div> </div></button><div class="dropdown-menu" style="max-height: 407px; overflow: hidden; min-height: 72px;"><div class="inner show" role="listbox" id="bs-select-3" tabindex="-1" style="max-height: 395px; overflow-y: auto; min-height: 60px;" aria-activedescendant="bs-select-3-3"><ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;"><li class="disabled"><a role="option" class="dropdown-item disabled" id="bs-select-3-0" aria-disabled="true" tabindex="-1" aria-setsize="3" aria-posinset="undefined"><span class=" bs-ok-default check-mark"></span><span class="text">Select Video Sources</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-3-1" tabindex="0" aria-setsize="3" aria-posinset="1"><span class=" bs-ok-default check-mark"></span><span class="text">Youtube</span></a></li><li class=""><a role="option" class="dropdown-item" id="bs-select-3-2" tabindex="0" aria-setsize="3" aria-posinset="2"><span class=" bs-ok-default check-mark"></span><span class="text">Vimeo</span></a></li><li class="selected active"><a role="option" class="dropdown-item active selected" id="bs-select-3-3" tabindex="0" aria-setsize="3" aria-posinset="3" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">Local</span></a></li></ul></div></div></div>
                                                </div>
                                            </div>

                                            <div class="course-field mb--15">
                                                <label for="videoUrl">Add Your Video URL</label>
                                                <input id="videoUrl" type="text" placeholder="Add Your Video URL here.">
                                                <small class="d-block mt_dec--5">Example: <a href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a></small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt--10 row g-5">
                            <div class="col-lg-12">
                                <button type="submit" class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Criar Curso</span>
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