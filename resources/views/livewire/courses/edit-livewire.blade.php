<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Editar Curso', 'url' => null],
    ],
    'pageTitle' => 'Editar Curso'
    ])
    <div class="row">
        <form method="POST" enctype="multipart/form-data" wire:submit.prevent='update("{{ $slug }}")'>
            @csrf
            <div class="accordion custom-accordion" id="custom-accordion-one">
                <div class="card mb-0">
                    <div class="card-header" id="headingFour">
                        <h5 class="m-0">
                            <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse"
                                href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Detalhes do Curso <i class="mdi mdi-chevron-down accordion-arrow"></i>
                            </a>
                        </h5>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                        data-bs-parent="#custom-accordion-one">
                        <div class="card-body">
                            <div class="rbt-course-field-wrapper rbt-default-form">
                                <div class="course-field mb--15">
                                    <label for="field-1">Titulo do Curso</label>
                                    <input id="field-1" type="text" placeholder="Novo Curso" wire:model="name">
                                    @error('name')
                                    <span class="color-danger p-2"><i class="feather-alert-cicle"></i>{{ $message
                                        }}</span>
                                    @enderror
                                </div>

                                <div class="course-field mb--15">
                                    <label for="aboutCourse">Sobre o curso</label>
                                    <textarea id="aboutCourse" rows="10" wire:model="description"
                                        placeholder="Descreva o curso"></textarea>
                                    @error('description')
                                    <span class="color-danger p-2"><i class="feather-alert-cicle"></i>{{ $message
                                        }}</span>
                                    @enderror
                                </div>

                                <div class="course-field mb--15 edu-bg-gray">
                                    <h6>Preço do Curso</h6>
                                    <div class="rbt-course-settings-content">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="advance-tab-button advance-tab-button-1">
                                                    <ul class="rbt-default-tab-button list-unstyled" id="coursePrice"
                                                        role="tablist">
                                                        <li class="w-100" role="presentation">

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="tab-content">

                                                    <div class="tab-pane fade advance-tab-content-1 active show"
                                                        id="paid" role="tabpanel" aria-labelledby="paid-tab">

                                                        <div class="course-field mb--15">
                                                            <label for="regularPrice-1">Em Meticais
                                                                (mzn)</label>
                                                            <input id="regularPrice-1" wire:model="price" type="number"
                                                                placeholder="mzn preço normal">
                                                            @error('price')
                                                            <span class="color-danger p-2"><i
                                                                    class="feather-alert-cicle"></i>{{ $message
                                                                }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-field mb--20">
                                    <h6>Capa do Curso</h6>
                                    <div class="rbt-create-course-thumbnail upload-area">
                                        <div class="upload-area">
                                            <div class="brows-file-wrapper" data-black-overlay="9">
                                                <!-- actual upload which is hidden -->
                                                <input wire:model="cover" id="createinputfile" type="file"
                                                    class="inputfile">
                                                <img id="createfileImage"
                                                    src="{{ !empty($cover)? $cover->temporaryUrl() : asset('storage/courses/'.$cover_2) }}"
                                                    alt="file image">
                                                <!-- our custom upload button -->
                                                <label class="d-flex" for="createinputfile"
                                                    title="Ficheiro nenhum escolhido">
                                                    <i class="fas fa-upload"></i>
                                                    <span class="text-center">Escolha a Capa do Curso</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <small><i class="feather-info"></i> <b>Tamanho Maximo:</b> 2MB,
                                        <b>Arquivos suportados:</b> JPG, JPEG, PNG, WEBP, GIF
                                        <b>Atenção:</b> Espere uns 15 segundos depois de carregar a imagem</small>
                                    @error('cover')
                                    <span class="color-danger p-2"><i class="feather-alert-cicle"></i>{{ $message
                                        }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Course Field Wrapper  -->
                            @if(session('success'))
                            <x-ancha-dreams-taste.alert :type="'success'" />
                            {{--
                            <x-ancha-dreams-taste.sweet-alert-mixin :message="session('success')" />
                            --}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt--30 row">
                    <div class="col-lg-12">
                        <button type="submit" class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center">
                            <span class="icon-reverse-wrapper">
                                <div wire:loading>
                                    <span class="btn-text">Processando o formulario..</span>
                                    <span class="btn-icon ms-1"><i class="feather-loader"></i></span>
                                    <span class="btn-icon me-1"><i class="feather-loader"></i></span>
                                </div>
                                <div wire:loading.remove>
                                    <span class="btn-text">Editar Curso</span>
                                    <span class="btn-icon ms-1"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon me-1"><i class="feather-arrow-right"></i></span>
                                </div>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>