<div class="row mt--20">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Utilizadores</h4>
                <p class="text-muted font-14">
                    Aqui encontraras a lista de todos os utilizadores registados no sistema (alunos, instructores e
                    administradores).
                </p>
                <div>
                    <table class="table table-centered table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Acesso</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Acção</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    {{ $role->name }}
                                    @endforeach</td>
                                <td>{{ $user->email }}</td>
                                <td>Onlline a 100 anos</td>
                                <td>
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Editar Permissões</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Excluir</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-block-helper me-1"></i>Bloquear</a>
                                        </div>
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