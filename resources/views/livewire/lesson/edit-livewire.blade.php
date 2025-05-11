<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Aulas', 'url' => route('lessons.list', ['slug' => $slug_course])],
    ['label' => 'Editar Aula', 'url' => null],
    ],
    'pageTitle' => 'Edição de aula'
    ])
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent='update({{ $slug }})'>
                @csrf
                <div class="course-field mb--20">
                    <label for="modal-field-1">Nome da Aula</label>
                    <input id="modal-field-1" type="text" wire:model="title">
                    <div>
                        <small>
                            <i class="feather-info"></i> Os títulos das aulas são exibidos publicamente sempre que
                            necessário. Cada aula pode conter um ou mais questionários.
                        </small>
                    </div>
                    <div>
                        @error('title')
                        <span class="color-danger"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="course-field mb--20">
                    <label for="editor">Resumo da Aula</label>
                    <textarea id="editor" wire:model="description">{{$description}}</textarea>
                    <div>
                        <small>
                            <i class="feather-info"></i> Adicione um resumo de um texto curto
                            para preparar os alunos para as atividades da Aula. O texto é
                            exibido ao lado da dica de ferramenta ao lado do nome da Aula.
                        </small>
                    </div>
                    <div>
                        @error('description')
                        <span class="color-danger"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="course-field mb--15">
                    <label for="videoUrl">Carregue o Video</label>
                    <input id="videoUrl" type="file" class="form-control" wire:model="video">
                    <div>
                        <small>
                            <i class="feather-info"></i> Carregue a sua video aula</a></small>
                    </div>
                    <div>
                        @error('video')
                        <span class="color-danger"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ratio ratio-21x9">
                        <iframe src="{{ $video }}"></iframe>
                    </div>
                </div>
                <div class="mt--10 row g-5">
                    <div class="col-lg-12">
                        <x-ancha-dreams-taste.button-loading :title="'Editar aula'" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>