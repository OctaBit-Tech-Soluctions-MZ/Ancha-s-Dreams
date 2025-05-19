<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    ['label' => 'Aulas', 'url' => null],
    ],
    'pageTitle' => 'Lista de Aulas'
    ])
    <div class="row col-sm-2 mb--20">
        <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
            href="{{route('lessons.register', ['slug'=> $slug])}}" wire:navigate>
            <span class="icon-reverse-wrapper g-2">
                <span class="btn-text ms-1 me-1">Nova Aula</span>
                <span class="btn-icon">
                    <i class="fas fa-plus-square"></i>
                </span>
                <span class="btn-icon">
                    <i class="fas fa-plus-square"></i>
                </span>
            </span>
        </a>
    </div>
    <div  wire:init='loadLessons'>
        @if(count($contents) == 0)
        <div class="p-3">
            <div class="color-primary d-flex w-100 justify-content-center align-items-center">
                <div class="spinner-border me-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Carregando as aulas...
            </div>
        </div>
        @else
        <div class="row">
            <div class="accordion custom-accordion" id="custom-accordion-one">
                @foreach($contents as $content)
                <div class="card mb-0">
                    <div class="card-header" id="heading{{ $loop->index + 1 }}">
                        <h5 class="m-0">
                            <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse" href="#collapse{{ $loop->index + 1 }}"
                                aria-expanded="false" aria-controls="collapse{{ $loop->index + 1 }}">
                                {{ $content->title }} <i class="mdi mdi-chevron-down accordion-arrow"></i>
                            </a>
                        </h5>
                    </div>

                    <div id="collapse{{ $loop->index + 1 }}" class="collapse" aria-labelledby="heading{{ $loop->index + 1 }}"
                        data-bs-parent="#custom-accordion-one">
                        <div class="card-body">
                            <!-- Contents -->
                            <div></div>
                            <!-- actions -->
                            <div class="d-flex gap-2 justify-content-end fw-bolder">
                                <a href="{{ route('lessons.edit', ['slug' => $content->slug]) }}" class="rbt-btn-link" wire:navigate>
                                    <i class="uil-edit"> Editar</i>
                                </a>
                                <a href="#" role="button" wire:click="destroy({{$content->id}})" wire:confirm class="rbt-btn-link"><i class="uil-trash"></i> Remover</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <x-ancha-dreams-taste.modals.delete-modal />
</div>