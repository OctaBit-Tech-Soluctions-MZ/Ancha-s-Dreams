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
                                            <label for="old_password" class="form-label">Palavra-passe Antiga</label>
                                            <input type="password" id="old_password" placeholder="digite a sua antiga palavra-passe"
                                                wire:model='old_password'>
                                            @error('old_password')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="password" class="form-label">Nova Palavra-Passe</label>
                                            <input type="password" id="password"
                                                placeholder="digite o sua Palavra-Passe" wire:model='password'>
                                            @error('password')
                                            <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="course-field mb-3 col-md-6">
                                            <label for="password_confirmation" class="form-label">Confirme a sua Nova Palavra-passe</label>
                                            <input type="password" id="password_confirmation" placeholder="digite de novo a sua Palavra passe"
                                                wire:model='password_confirmation'>
                                        </div>
                                    </div>
                                    @if (session('success'))
                                    <x-ancha-dreams-taste.alert :type="'success'" />
                                    @endif
                                    <x-ancha-dreams-taste.button-loading :title="'Mudar Palavra Passe'" />
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>