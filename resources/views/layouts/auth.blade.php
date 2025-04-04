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
        
        <script src="https://unpkg.com/scrollreveal"></script>
      
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/css.css') }}" rel="stylesheet" />

        {{-- Plans Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/plans.css') }}">

        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        {{-- Profile Custom css --}}
        <link rel="stylesheet" href="{{asset('assets/css/profile.css') }}">


        <style>
            .nav-link span, .btn-tx span{
                font-size: 0.78rem
            }

            @media (max-width: 578px){
                .card-auth {
                    width: 100%;
                }
            }
            
        </style>


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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
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
                                <a class="nav-link" href="{{ route('book') }}">
                                    <span>Livros</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('courses') }}">
                                    <span>Cursos</span>
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
                        <div class="d-flex">
                            <li class="nav-item me-1">
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
                
        @yield('content')
        
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

        @auth
        <!-- Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Terminar sessão</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Clique em Terminar caso queria terminar a sessão
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Terminar') }}</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir este item?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var deleteModal = document.getElementById('deleteModal');
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var form = document.getElementById('deleteForm');
                    var actionUrl = button.getAttribute('data-action');
                    form.action = actionUrl; 
                });
            });
        </script>
        @endauth

        {{-- custom js --}}
        <script src="{{ asset('assets/js/app.js') }}"></script>
        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        {{-- Chart js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
</body>
</html>

