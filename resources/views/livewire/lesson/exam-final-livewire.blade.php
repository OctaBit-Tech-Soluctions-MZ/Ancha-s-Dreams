<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Exame Final', 'url' => null],
    ],
    'pageTitle' => 'Exame Final'
    ])
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="rbt-course-field-wrapper rbt-default-form">
                    <form method="POST" wire:submit.prevent='create'>
                        @csrf
                        <div class="course-field mb--15">
                            <label for="title">Titulo do Exame</label>
                            <input type="text" wire:model="title" id="title" placeholder="Informe o titulo do exame">
                        </div>
                        <div class="course-field mb--15">
                            <label for="field-1">Descrição do Exame</label>
                            <textarea wire:model="description"></textarea>
                            @error('description')
                            <span class="color-danger p-2"><i class="feather-alert-cicle"></i>{{ $message
                                }}</span>
                            @enderror
                        </div>
                        <div class="course-field mb--15">
                            <label class="form-label">Tempo Limite</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00">
                            <span class="font-13 text-muted">e.g "H:M:s = 00:45:00"</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" wire:submit.prevent='create'>
                    @csrf
                    <div class="rbt-course-field-wrapper rbt-default-form">
                        <h5>Questões do Exame
                        </h5>
                        <div class="rbt-course-settings-content">
                            <div class="row">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade advance-tab-content-1 active show" id="paid"
                                            role="tabpanel" aria-labelledby="paid-tab">
                                            <div class="course-field mb--15">
                                                <label for="title">Escreva a sua questão aqui</label>
                                                <input type="text" wire:model="title" id="title">
                                            </div>
                                            <div class="course-field mb--15">
                                                <label for="example-select" class="form-label">Tipo de Resposta</label>
                                                <select class="form-select" id="example-select" wire:model='answer'>
                                                    <option value="0" selected='select' wire:click='answerType("0")'>Multipla Escolha</option>
                                                    <option value="1" wire:click='answerType("1")'>Verdadeiro ou Falso</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rbt-course-field-wrapper rbt-default-form">
                        <h5>Reposta e opções do Exame
                        </h5>
                        <div class="rbt-course-settings-content">
                            <div class="row">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade advance-tab-content-1 active show" id="paid"
                                            role="tabpanel" aria-labelledby="paid-tab">
                                            @if($answer == 0)
                                            <div class="course-field mb--15">
                                                <label for="answer1">Multipla Escolha</label>
                                                <input type="text" wire:model="answer1" id="answer1"
                                                    placeholder="Informe a primeira opção">
                                                <input type="text" wire:model="answer2" id="answer2"
                                                    placeholder="Informe a segunda opção">
                                                <input type="text" wire:model="answer3" id="answer3"
                                                    placeholder="Informe a terceira opção">
                                                <input type="text" wire:model="answer4" id="answer4"
                                                    placeholder="Informe a quarta opção">
                                            </div>
                                            @else
                                            <div class="course-field mb--15">
                                                <label for="answer1">Verdadeiro ou Falso</label>
                                                <div class="form-check form-check-inline">
                                                    <div class="border border-1 rounded p-1">
                                                        <input type="radio" id="customRadio3" name="customRadio1"
                                                            class="form-check-input">
                                                        <label class="form-check-label" for="customRadio3">
                                                            Verdadeiro</label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="border border-1 rounded p-1">
                                                        <input type="radio" id="customRadio4" name="customRadio1"
                                                            class="form-check-input">
                                                        <label class="form-check-label" for="customRadio4">Falso</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="course-field mb--15 d-flex justify-content-end">
                        <x-ancha-dreams-taste.button-loading :title="'Salvar'" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>