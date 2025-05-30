<div class='mt--15'>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'utilizadores', 'url' => route('users.list')],
    ['label' => 'Novo Instrutor', 'url' => null],
    ],
    'pageTitle' => 'Novo Instrutor'
    ])
    <div class="row">
        <form class="rbt-course-field-wrapper rbt-default-form" method="POST" wire:submit.prevent='create'>
            @csrf
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" placeholder="digite o nome do instrutor" wire:model='name'>
                    @error('name')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <label for="surname" class="form-label">Sobrenome</label>
                    <input type="text" id="surname" placeholder="digite o sobrenome do instrutor" wire:model='surname'>
                    @error('surname')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" placeholder="digite o email do instrutor" wire:model='email'>
                    @error('email')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <label for="phone_number" class="form-label">Numero de Telefone</label>
                    <input type="text" id="phone_number" placeholder="digite o numero de telefone do instrutor" wire:model='phone_number'>
                    @error('phone_number')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="biography">Biografia (Mini Curriculo)</label>
                    <textarea id="biography" cols="30" rows="10" wire:model='biography'></textarea>
                    @error('biography')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <label for="specialty">Especialidades</label>
                    <textarea id="editor1" cols="30" rows="10" wire:model='specialty'></textarea>
                    @error('specialty')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            @if (session('success'))
                <x-ancha-dreams-taste.alert :type="'success'"/>
            @endif
            <x-ancha-dreams-taste.button-loading :title="'Registar instrutor'" />
        </form>

    </div>
</div>