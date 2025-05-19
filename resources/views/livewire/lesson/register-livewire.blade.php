<div>

    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Aulas', 'url' => route('lessons.list', ['slug' => $slug])],
    ['label' => 'Nova Aula', 'url' => null],
    ],
    'pageTitle' => 'Adicionar Nova de Aula'
    ])
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent='create'>
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
                    <label for="description">Resumo da Aula</label>
                    <div wire:ignore><textarea id="description" wire:model="description"
                            placeholder="escreva o resumo da aula aqui..."></textarea></div>

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
                </div>
                <div class="row g-2">
                    <div class="course-field mb--20">
                        <label for="editor">Escreva sua Receita aqui (opcional)</label>
                        <!-- Create the editor container -->
                        <div wire:ignore>
                            <div id="editor" class="quill-editor" style="height: 200px">
                                {!! $recipe !!}
                            </div>
                        </div>
                        <br>
                        <small>
                            <i class="feather-info"></i> Adicione uma Descrição detalhada sobre os Ingredientes, tempo
                            de preparo e passos a seguir nesta
                            receita.
                        </small>
                    </div>
                </div>
                @if (session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'"/>
                @endif
                <div class="mt--10 row g-5">
                    <div class="col-lg-12">
                        <x-ancha-dreams-taste.button-loading :title="'Registar aula'" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>