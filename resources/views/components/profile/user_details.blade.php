<div class="panel card shadow border border-0">
    <div class="bio-graph-heading bg-dark">
        Aprendendo, cozinhando e evoluindo! Aqui para explorar novos sabores e aprimorar minhas habilidades culinárias.
    </div>
    <div class="panel-body bio-graph-info p-3">
        <h1>Perfil do Utilizador</h1>
        <div class="row">
            <div class="bio-row">
                <p><span>Nome Completo </span>: {{ $user->name }}</p>
            </div>
            <div class="bio-row">
                <p><span>Tipo de Conta </span>: {{ $role->role_name }}</p>
            </div>
            <div class="bio-row">
                <p><span>Email </span>: {{ $user->email }}</p>
            </div>
        </div>
    </div>
</div>