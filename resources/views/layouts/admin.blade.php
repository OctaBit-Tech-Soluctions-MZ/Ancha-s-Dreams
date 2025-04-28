<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">

</head>
<body>
        <!-- Loader -->
        <div class="loader-container" id="loader">
            <div class="lds-roller">
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>
        </div>

        <div id="wrapper">
            <!-- Sidebar -->
            <nav class="col-3 bg-dark vh-100 sidebar show collapse" id="sidebar">
                <ul class="nav flex-column">
                     <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <img src="{{ asset('assets/img/navbar-logo.svg') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2 text-white">Escola de Culinaria</div>
                    </a>

                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('admin.dashboard') }}">
                            <i class="feather-home me-2"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('admin.users') }}">
                            <i class="feather-users me-2"></i>
                            <span>Utilizadores</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('admin.books') }}">
                            <i class="feather-book me-2"></i>
                            <span>Livros</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('admin.courses')}}">
                            <i class="feather-award me-2"></i>
                            <span>Cursos</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('admin.courses')}}">
                            <i class="feather-shopping-bag me-2"></i>
                            <span>Produtos</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="#">
                            <i class="feather-info me-2"></i>
                            <span>Feedbacks</span></a>
                    </li>
                </ul>
            </nav>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">

                    <div class="rbt-header-wrapper header-space-betwween header-sticky border border-bottom p-2 shadow-sm">
                        <div class="container-fluid">
                            <div class="mainbar-row rbt-navigation-center align-items-center">
                                <div class="header-left rbt-header-content w-100">
                                    <div class="header-info d-flex justify-content-between w-100">   
                                        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3" 
                                        data-bs-toggle="collapse" href="#sidebar" role="button" data-bs-target="#sidebar">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="mt-2">
                                            <x-profile-dropdown :profileRoute="route('instructor.profile')"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <!-- Content Row -->
                    <div class="row p-2">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    @include('components.modals.logout')
    @include('components.modals.delete')
    @include('components.scripts.get-id-to-delete')


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- jQuery e DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <!-- Trix Editor JS -->
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>