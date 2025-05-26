<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Exame Final', 'url' => route('exams.list', ['slug' => $slug])],
    ['label' => 'Questões do Exame', 'url' => null],
    ],
    'pageTitle' => 'Questões do Exame'
    ])
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST" wire:submit.prevent='create'>
                    @csrf
                    <div class="row">
                        <div class="course-field mb--15">
                            <label for="question">Escreva a sua questão aqui</label>
                            <input type="text" wire:model="question" id="question"
                                placeholder="Escreva a sua questão aqui...">
                        </div>
                    </div>
                    <div class="row">
                        @foreach($options as $index => $option)
                        <div class="row mb-3 gap-1">
                            <div class="col-md-5">
                                <input type="text" class="form-control" wire:model="options.{{ $index }}.text"
                                    placeholder="Opção {{ $index + 1 }}">
                            </div>
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <button type="button" class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
                                    wire:click='removeOption({{$index}})'>
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text ms-2 me-2">Remover Opção</span>
                                        <span class="btn-icon"><i class="feather-x-square"></i></span>
                                        <span class="btn-icon"><i class="feather-x-square"></i></span>
                                    </span>
                                </button>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <div class="form-check">
                                    @php $uid = uniqid() @endphp
                                    <input type="radio" id="customRadio{{ $uid }}" wire:model="correctIndex"
                                        wire:click="hasCorrect({{ $index }})" value="{{ $index }}"
                                        class="form-check-input" name="correctIndex">

                                    <label class="form-check-label d-inline-block" for="customRadio{{ $uid }}">
                                        Opção correcta
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="rbt-tutor-information-right mb-2 mt-2">
                        <div class="d-flex justify-content-start">
                            <button type="button" class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
                                wire:click='addOption'>
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text ms-2 me-2">Adicionar Opção</span>
                                    <span class="btn-icon"><i class="feather-plus-square"></i></span>
                                    <span class="btn-icon"><i class="feather-plus-square"></i></span>
                                </span>
                            </button>
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