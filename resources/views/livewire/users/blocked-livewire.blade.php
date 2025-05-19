<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Utilizadores', 'url' => route('users.list')],
    ['label' => 'Bloquear Utilizador', 'url' => null],
    ],
    'pageTitle' => 'Bloquear Utilizador'
    ])
    <div class="row">
        <form class="rbt-course-field-wrapper rbt-default-form" method="POST" wire:submit.prevent='blockedUser({{$id}})'>
            @csrf
            <div class="row g-2">
                <div class="course-field mb-3 col-md-12">
                    <label for="name" class="form-label">Motivo</label>
                    <textarea id="name" placeholder="informe o motivo do bloqueio" wire:model='reason' rows="8"></textarea>
                    @error('name')
                    <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <x-ancha-dreams-taste.button-loading :title="'Bloquear'" />
        </form>
    </div>
</div>