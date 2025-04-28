<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sal.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/euclid-circulara.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnigy-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plyr.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jodit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
        <script src="https://unpkg.com/scrollreveal"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->

        @auth
            <style>
                @media (max-width: 578px){
                    .navbar-brand {
                        display: none;
                    }
                }
            </style>
        @endauth
    </head>
    <body id="page-top">
        <!-- Loader -->
        <div class="loader-container" id="loader">
            <div class="lds-roller">
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>
        </div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary fixed-top @yield('header_bg', '') header-scroll" id="mainNav">
            <div class="container gap-5">
                <a class="navbar-brand" href="#page-top">
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
                                <a class="nav-link fs-7" href="{{ route('home') }}">
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-7" href="{{ route('courses') }}">
                                    <span>Cursos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-7" href="{{ route('book') }}">
                                    <span>Livros</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-7" href="{{ route('recipes') }}">
                                    <span>Receitas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-7" href="{{ route('recipes') }}">
                                    <span>Mini Shop</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link fs-7">
                                    <span>Sobre Nós</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contacts') }}" class="nav-link fs-7">
                                    <span>Contactos</span>
                                </a>
                            </li>
                        </div>
        
                        {{-- so aparece quando o utilizador nao esta logado --}}
                        @guest
                        <!-- Botão de Cadastro/Login -->
                        <div class="d-flex">
                            <li class="nav-item">
                                <a class="btn-sm btn btn-outline-light rounded-sm fs-7" href="{{ route('login') }}">
                                    <span>Login</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm rounded-sm fs-7" href="{{ route('register') }}">
                                    <span>Registo</span>
                                </a>
                            </li>
                        </div>
                        @endguest
                    </ul>
                </div>
        
                {{-- so aparece quando o utilizador esta logado --}}
                @auth
                    <x-profile-dropdown :profileRoute="route('profile.show')" :color='"text-white"'/>
                @endauth
            </div>
        </nav>
        
        <!-- content -->
        @yield('content')
        <!-- Botão Flutuante -->
        <button type="button" class="floating-btn border border-0" title="Carrinho" 
            data-bs-toggle="modal" data-bs-target="#cartModal">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website <script>document.write(new Date().getFullYear());</script></div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modals -->
        @Auth
            @include('components.modals.logout')
        @endauth
            @include('components.modals.cart')
        <script>
            var baseUrl = "{{ asset('assets/img/') }}";
        </script>
        <script src="{{ asset('assets/js/cart.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/swiper.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/imageloaded.js') }}"></script>
        <script src="{{ asset('assets/js/isotop.js')}}"></script>
        <script src="{{ asset('assets/js/magnify-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/sal.js') }}"></script>
        <script src="{{ asset('assets/js/wow.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-one-page-nav.js')}}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
        <script src="{{ asset('assets/js/plyr.js')}}"></script>
        <script src="{{ asset('assets/js/jodit.min.js')}}"></script>
        <script src="{{ asset('assets/js/theme-idle_fingers.js') }}"></script>
        <script src="{{ asset('assets/js/mode-html.js') }}"></script>
        <script src="{{ asset('assets/js/editor.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>