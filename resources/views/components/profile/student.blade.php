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
            <p><a href="{{ route('profile.image') }}" class="__image__"><i class="fa-solid fa-camera"></i></a></p>
        </div>

        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.show') }}"> 
                    <i class="fa fa-user me-3"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.edit') }}">
                    <i class="fa fa-edit me-3"></i> Editar Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" href="{{ route('profile.password') }}">
                    <i class="fa fa-lock me-3"></i> Mudar Senha</a>
            </li>
        </ul>
    </div>
</div>