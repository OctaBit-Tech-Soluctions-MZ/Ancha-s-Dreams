<div class="mt--80 p-2 mb--40">
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses')],
    ['label' => $name, 'url' => route('courses.details', ['slug' => $slug])],
    ['label' => 'Avaliar '.$name, 'url' => null],
    ],
    'pageTitle' => 'Avaliar '.$name
    ])
    @if (session('success'))
        <x-ancha-dreams-taste.alert :type="'success'"/>
    @endif
    <div class="row p-2 d-flex justify-content-center align-items-center">

        <div class="card shadow p-3 col-sm-6">
            <form method="POST" wire:submit.prevent='sendTestimonial'>
                @csrf
                <input type="hidden" wire:model='rate' id="rateInput">
                <div class="mb-3">
                    <div class="rating-widget mb-4 text-center">
                        <!-- Rating Stars Box -->
                        <div class="rating-stars">
                            <ul id="stars">
                                <li class="star" title="Poor" data-value="1">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" title="Fair" data-value="2">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" title="Good" data-value="3">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" title="Excellent" data-value="4">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" title="WOW!!!" data-value="5">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Escreva o seu testemunho" rows="5"
                        wire:model='comment'></textarea>
                </div>
                <button class="btn btn-success btn-block" type="submit">
                    <div wire:loading>
                        <span class="btn-text">Processando...</span>
                        <span class="btn-icon me-1 spinner-border spinner-border-sm me-1" role="status"
                            aria-hidden="true"></span>

                    </div>
                    <span wire:loading.remove>Avaliar</span>
                </button>
            </form>
        </div>
    </div>
</div>