<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Exame Final', 'url' => route('exams.list', ['slug' => $slug])],
    ['label' => 'Criar Exame', 'url' => null],
    ],
    'pageTitle' => 'Criar Exame'
    ])
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="rbt-course-field-wrapper rbt-default-form">
                    @if (session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'" />
                    @endif
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
                        <div class="row">
                            <div class="course-field col-md-6 mb--15">
                                <label class="form-label">Tempo Limite</label>
                                <input type="text" wire:model='timelimit' class="form-control" data-toggle="input-mask"
                                    data-mask-format="00:00:00">
                                <span class="font-13 text-muted">e.g "H:M:s = 00:45:00"</span>
                            </div>
                            <div class="course-field col-md-6 mb--15">
                                <label class="form-label">Nota Minina</label>
                                <input type="text" wire:model='passing' class="form-control">
                                <span class="font-13 text-muted">Nota Minima para passar no exame (0-20)</span>
                            </div>
                        </div>
                        <div class="course-field mt-3 mb--15 d-flex justify-content-end">
                            <x-ancha-dreams-taste.button-loading :title="'Salvar'" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>