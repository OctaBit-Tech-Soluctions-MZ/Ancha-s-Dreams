<div class="row mt--20">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Utilizadores</h4>
                <p class="text-muted font-14">
                    Aqui encontraras a lista de todos os utilizadores registados no sistema (alunos, instructores e
                    administradores).
                </p>
                <form wire:submit.prevent='filter' class="row mb-2 mt-2 d-flex justify-content-end">
                    @csrf
                    <div class="course-field col-md-6 d-flex">
                        <input type="text" placeholder="pesquise aqui..." wire:model='filter' class="border border-1 rounded-0">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="table-responsive">
                    @if (session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'" />
                    @endif
                    <table class="table table-centered table-borderless mb-0" wire:poll.30s id="users-datatable">
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
                                    @endif
                                </td>
                                <td class="d-flex gap-1">
                                    <!-- item-->
                                    @php
                                    $block = optional($user->blocked)->first();
                                    @endphp

                                    @if($block && $block->is_blocked == 1 && empty($block->unblocked_at))
                                    <button type="button" wire:click='unblocked({{ $user->id }})'
                                        wire:confirm='Tem certeza que deseja desbloquear o utilizador {{ $user->name }}?'
                                        class="btn btn-warning">
                                        <i class="mdi mdi-account-check me-1" title="Desbloquear utilizador"></i>
                                        Desbloquear
                                    </button>
                                    @else
                                    <a href="{{ route('users.blocked', ['slug' => $user->slug]) }}"
                                        class="btn btn-warning">
                                        <i class="mdi mdi-block-helper me-1" title="Bloquear utilizador"></i>
                                        Bloquear
                                    </a>
                                    @endif
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