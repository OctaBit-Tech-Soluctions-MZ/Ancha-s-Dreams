<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'utilizadores', 'url' => route('users.list')],
    ['label' => 'Gestão de Permissões', 'url' => null],
    ],
    'pageTitle' => 'Gestão de Permissões'
    ])    
    <div class="row mt--20">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Utilizadores - Permissões</h4>
                    <p class="text-muted font-14">
                        Aqui encontraras a lista de todos os utilizadores registados no sistema (alunos, instructores e
                        administradores).
                    </p>
                    <div>
                        <table class="table table-centered table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome da Pemissão</th>
                                    <th>Acção (Habilitar/Desabilitar)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end preview-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div>