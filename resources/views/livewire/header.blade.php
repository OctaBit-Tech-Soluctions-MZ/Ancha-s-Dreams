<div>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top {{ $bg }}" id="mainNav">
            <div class="container gap-5">
                <a class="navbar-brand" href="#page-top" id='logo-nav'>
                    <img src="{{ asset('assets/img/navbar-logo.svg') }}" alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-capitalize d-flex gap-5 w-auto">
                        <div class="d-sm-flex justify-content-center px-1 me-1 ms-3 pe-1 ps-3">
                            <li class="nav-item">
                                <a class="nav-link fs-7 border border-0" href="{{ route('home') }}" wire:current.exact="text-primary border-bottom border-3 fw-bolder border-primary" wire:navigate>
                                    <span>Inicio</span>
                                </a>
                            </li>
                             <li class="nav-item mx-lg-1">
                                <a class="nav-link fs-7" href="{{ route('courses') }}"  wire:current.exact="text-primary border-bottom border-3 fw-bolder border-primary" wire:navigate>
                                    <span>Cursos</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-1">
                                <a class="nav-link fs-7" href="{{ route('shop') }}"  wire:current.exact="text-primary border-bottom border-3 fw-bolder border-primary" wire:navigate>
                                    <span>Loja</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-1">
                                <a href="{{ route('about') }}" class="nav-link fs-7"  wire:current.exact="text-primary border-bottom border-3 fw-bolder border-primary" wire:navigate>
                                    <span>Sobre Nós</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-1">
                                <a href="{{ route('contacts') }}" class="nav-link fs-7"  wire:current.exact="text-primary border-bottom border-3 fw-bolder border-primary" wire:navigate>
                                    <span>Contactos</span>
                                </a>
                            </li>
                        </div>
        
                        {{-- so aparece quando o utilizador nao esta logado --}}
                        @guest
                        <!-- Botão de Cadastro/Login -->
                        <div class="d-flex">
                            <li class="nav-item me-2">
                                <a class="btn-sm btn btn-outline-light rounded-sm fs-7" href="{{ route('login') }}" wire:navigate>
                                    <span>Login</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm rounded-sm fs-7" href="{{ route('register') }}" wire:navigate>
                                    <span>Registo</span>
                                </a>
                            </li>
                        </div>
                        @endguest
                    </ul>
                </div>
        
                {{-- so aparece quando o utilizador esta logado --}}
                @auth
                    @if(auth()->user()->hasAnyRole('admin') || auth()->user()->hasAnyRole('super admin'))
                        <a href="{{ route('admin') }}" class="rbt-btn-link text-white" wire:navigate>Voltar Para o Painel de Admin</a>
                    @elseif(auth()->user()->hasAnyRole('instrutor'))
                        <a href="{{ route('dashboard') }}" class="rbt-btn-link text-white" wire:navigate>Voltar Para o Painel do Instrutor</a>
                    @else
                        <x-ancha-dreams-taste.profile-dropdown :profileRoute="route('profile.show')" :color='"text-white"'/>
                    @endif
                @endauth
            </div>
        </nav>
</div>
