<nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary fixed-top bg-nav" id="mainNav">
    <div class="container gap-5">
        <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('assets/img/navbar-logo.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase d-flex gap-5 w-auto">
                <div class="d-sm-flex justify-content-center px-1 me-1 ms-3 pe-1 ps-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">
                            <span>Cursos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book') }}">
                            <span>Livros</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('receita') }}">
                            <span>Receita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">
                            <span>Sobre Nós</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts') }}" class="nav-link">
                            <span>Contactos</span>
                        </a>
                    </li>
                </div>

                {{-- so aparece quando o utilizador nao esta logado --}}
                @guest
                <!-- Botão de Cadastro/Login -->
                <div class="d-flex gap-2">
                    <li class="nav-item">
                        <a class="btn-tx btn btn-outline-primary rounded-sm" href="{{ route('login') }}">
                            <span>Login</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn-tx btn btn-primary rounded-sm" href="{{ route('register') }}">
                            <span>Registo</span>
                        </a>
                    </li>
                </div>
                @endguest
            </ul>
        </div>

        {{-- so aparece quando o utilizador esta logado --}}
        @auth
        <a class="btn btn-transparent bg-transparent"  href="{{ route('profile.show') }}">
          
              <img class="img-profile rounded-circle"
                  src="{{ asset('assets/img/undraw_profile_1.svg') }}">
        </a>
        <button type="button" class="btn btn-danger btn-sm fw-bolder" 
                data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        @endauth
    </div>
</nav>