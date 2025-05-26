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
                        <h1>Perfil do Utilizador</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>Nome Completo </span>: {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                            </div>
                            <div class="bio-row text-capitalize">
                                <p><span>Utilizador </span>: 
                                    @foreach(Auth::user()->roles as $role)
                                        {{$role->name}}
                                    @endforeach
                                </p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: {{ Auth::user()->email }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Telefone </span>: {{ Auth::user()->phone_number }}</p>
                            </div>
                        </div>
                        <div class="row">
                            @if (Auth::user()->hasAnyRole('instrutor'))
                            <div class="bio-row">
                                <p><span>Biografia </span>: {{ Auth::user()->instructors->biography }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Especialidades </span>: {{ Auth::user()->instructors->specialty }}</p>
                            </div>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>