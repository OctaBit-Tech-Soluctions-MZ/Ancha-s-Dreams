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
                    <table class="table table-centered table-borderless mb-0" wire:poll.30s>
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
                                <td>@if($user->isOnline())
                                    <span class="badge bg-success p-1">Online</span>
                                @else
                                    <span class="badge bg-danger p-1">Offline</span>
                                @endif</td>
                                <td class="d-flex gap-1">
                                    <!-- item-->
                                    <a href="{{ route('users.permissions',['slug' => $user->slug]) }}"
                                        class="btn btn-primary" title="Editar Permissões do utilizador" wire:navigate><i class="mdi mdi-pencil me-1"></i></a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="btn btn-danger"><i
                                            class="mdi mdi-delete me-1" title="Excluir utilizador"></i></a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="btn btn-warning"><i
                                            class="mdi mdi-block-helper me-1" title="Bloquear utilizador"></i></a>

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