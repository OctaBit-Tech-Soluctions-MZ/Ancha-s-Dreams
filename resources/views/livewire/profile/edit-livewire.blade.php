<div class='mt--15'>
    <div class="mt--110">
        <div class="container bootstrap snippets bootdey" style="font-size: 13px;">
            <div class="row">
                <x-ancha-dreams-taste.sidebar-profile />
                <div class="profile-info col-md-9">
                    <div class="panel card shadow border border-0">
                        <div class="bio-graph-heading bg-dark">
                            Aprendendo, cozinhando e evoluindo! Aqui para explorar novos sabores e aprimorar minhas
                            habilidades culinárias.
                        </div>
                        <div class="panel-body bio-graph-info p-3">
                            <div class="row">
                                <form class="rbt-course-field-wrapper rbt-default-form" method="POST"
                                    wire:submit.prevent='update'>
                                    @csrf
                                    <div class="row g-2">
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" id="name" placeholder="digite o seu nome"
                                                wire:model='name'>
                                            @error('name')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="surname" class="form-label">Sobrenome</label>
                                            <input type="text" id="surname"
                                                placeholder="digite o seu sobrenome" wire:model='surname'>
                                            @error('surname')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" id="email" placeholder="digite o seu email"
                                                wire:model='email'>
                                            @error('email')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="phone_number" class="form-label">Numero de Telefone</label>
                                            <input type="text" id="phone_number"
                                                placeholder="digite seu o numero de telefone"
                                                wire:model='phone_number'>
                                            @error('phone_number')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(Auth::user()->hasAnyRole('instrutor'))
                                    <div class="row g-2">
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="biography">Biografia (Mini Curriculo)</label>
                                            <textarea id="biography" cols="30" rows="10"
                                                wire:model='biography'></textarea>
                                            @error('biography')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="specialty">Especialidades</label>
                                            <textarea id="specialty" cols="30" rows="10"
                                                wire:model='specialty'></textarea>
                                            @error('specialty')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <x-ancha-dreams-taste.alert :type="'success'" />
                                    @endif
                                    <x-ancha-dreams-taste.button-loading :title="'Editar dados de utilizador'" />
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>