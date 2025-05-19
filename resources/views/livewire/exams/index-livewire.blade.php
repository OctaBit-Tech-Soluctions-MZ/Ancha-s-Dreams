<div>
    <div>
        @livewire('breadcrumb', [
        'pages' => [
        ['label' => 'Cursos', 'url' => route('courses.instructor')],
        ['label' => 'Exame Final', 'url' => null],
        ],
        'pageTitle' => 'Exame Final'
        ])
        @if(empty($exam))
        <div class="rbt-tutor-information-right mb-2 mt-2">
            <div class="d-flex justify-content-start">
                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
                    href="{{ route('exams.register', ['slug' => $slug]) }}" wire:navigate>
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text ms-2 me-2">Criar Exame</span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                    </span>
                </a>
            </div>
        </div>
        @else
        <div class="rbt-tutor-information-right mb-2 mt-2">
            <div class="d-flex justify-content-start">
                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
                    href="{{ route('question.register', ['id' => $exam->id]) }}" wire:navigate>
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text ms-2 me-2">Adicionar Questões</span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                    </span>
                </a>
            </div>
        </div>
        @endif
        <div class="row">
            <ul class="nav nav-tabs nav-bordered mb-3">
                <li class="nav-item">
                    <a href="#general_info" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">Informações Gerais</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#question" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                        <span class="d-none d-md-block">Questões</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="general_info">
                    @if(!empty($exam))
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Profile -->
                            <div class="card bg-primary">
                                <div class="card-body profile-user-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div>
                                                        <h4 class="mt-1 mb-1 text-white">{{$exam->title}}</h4>
                                                        <p class="font-13 text-white-50"> Titulo do Exame</p>

                                                        <ul class="mb-0 list-inline text-light">
                                                            <li class="list-inline-item me-3">
                                                                <h5 class="mb-1">{{$exam->time_limit}}</h5>
                                                                <p class="mb-0 font-13 text-white-50">Duração do Exame
                                                                </p>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <h5 class="mb-1">{{$exam->passing}}/20</h5>
                                                                <p class="mb-0 font-13 text-white-50">Nota
                                                                    necessario para passar
                                                                </p>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="mb-1">
                                                                    @if($exam->status == 'draft')
                                                                    Rascunho (Não foi publicado)
                                                                    @elseif($exam->status == 'published')
                                                                    Publicado
                                                                    @endif
                                                                </h5>
                                                                <p class="mb-0 font-13 text-white-50">Status
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col-->

                                        <div class="col-sm-4">
                                            <div class="text-center mt-sm-0 mt-3 mb-2 text-sm-end">
                                                <a href="{{route('exams.edit', ['id'=> $exam->id])}}"
                                                    class="btn btn-light" wire:navigate>
                                                    <i class="mdi mdi-pencil-box-outline me-1"></i> Editar
                                                </a>
                                            </div>
                                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                                @if($exam->status == 'draft')
                                                <button type="button" class="btn btn-light"
                                                    wire:click='hasPublished("published")'>
                                                    <i class="mdi mdi-eye me-1"></i> Publicar
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-light"
                                                    wire:click='hasPublished("draft")'>
                                                    <i class="mdi mdi-eye-off me-1"></i> Despublicar
                                                </button>
                                                @endif
                                            </div>
                                        </div> <!-- end col-->s
                                    </div> <!-- end row -->

                                </div> <!-- end card-body/ profile-user-box-->
                            </div>
                            <!--end profile/ card -->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    @else
                    <span class="text-center mt-3 fs-3">O exame ainda não foi criado</span>
                    @endif
                </div>
                <div class="tab-pane" id="question">
                    @if(empty($exam->questions))
                    <span class="text-center mt-3 fs-3">Nenhum Questão foi criado</span>
                    @else
                    <div class="accordion custom-accordion" id="custom-accordion-one">
                        @foreach($exam->questions as $question)
                        <div class="card mb-0">
                            <div class="card-header" id="heading{{$loop->index + 1}}">
                                <h5 class="m-0">
                                    <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse"
                                        href="#collapse{{$loop->index + 1}}" aria-expanded="true"
                                        aria-controls="collapse{{$loop->index + 1}}">
                                        {{$question->question_text}}? <i
                                            class="mdi mdi-chevron-down accordion-arrow"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse{{$loop->index + 1}}" class="collapse show"
                                aria-labelledby="heading{{$loop->index + 1}}" data-bs-parent="#custom-accordion-one">
                                <div class="card-body">
                                    <h5>Opções</h5>
                                    <ol class="list-group list-group-numbered">
                                        @foreach($question->answers as $answer)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $answer->answer_text }}</div>
                                            </div>
                                            <span class="badge bg-primary rounded-pill p-1">{{ $answer->is_correct?
                                                'Opção Correcta' : 'Opção Errada' }}</span>
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="d-flex gap-1 p-3 justify-content-end">
                                    <a href="{{route('question.edit',['id' => $question->id ])}}" class="btn btn-primary btn-sm" wire:navigate><i class="feather-edit"></i> Editar</a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="feather-trash"></i> Excluir</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>