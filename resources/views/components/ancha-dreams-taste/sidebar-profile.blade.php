<div class="profile-nav col-md-3">
    <div class="panel card shadow border border-0">
        <div class="user-heading round bg-dark">
            <a href="#">
                @php
                    $profile_photo = Auth::user()->profile_photo_path == NULL ? 'undraw_profile_1.svg' : 
                     Auth::user()->profile_photo_path;
                @endphp
                <img src="{{ asset('/assets/img/'.$profile_photo) }}" alt="">
            </a>
            <h1>{{ Auth::user()->name }}</h1>
            <form method="post" class="mt-2">
                <p><label for="photo" class="btn btn-primary btn-sm"><i class="fa fa-camera"></i></label></p>
                <input type="file" wire:model="photo" id="photo" class="d-none">
            </form>
        </div>

        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.show') }}" wire:navigate>
                    <i class="fa fa-user me-3"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.edit') }}" wire:navigate>
                    <i class="fa fa-edit me-3"></i> Editar Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.password') }}" wire:navigate>
                    <i class="fa fa-lock me-3"></i> Mudar Senha</a>
            </li>
            @if(auth()->user()->hasAnyRole('aluno'))
            
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.orders') }}" wire:navigate>
                    <i class="fa fa-list me-3"></i> Historico de Pedidos</a>
            </li>
            @endif
        </ul>
    </div>
</div>