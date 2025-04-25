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

    <!-- Pixcels Themes CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sidebar.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">

    <!-- Profile Css -->
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
    
    <div class="">
        <div id="wrapper">
            <!-- Sidebar -->
            <nav class="col-3 bg-dark vh-100 sidebar show collapse" id="sidebar">
                <ul class="nav flex-column">
                     <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <img src="{{ asset('assets/img/navbar-logo.svg') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2 text-white">Escola de culinária</div>
                    </a>

                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('instructor.dashboard') }}">
                            <i class="fas fa-fw fa-tachometer-alt me-2"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('instructor.courses')}}">
                            <i class="fas fa-fw fa-certificate me-2"></i>
                            <span>Cursos</span></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link p-2" aria-current="page" href="{{ route('instructor.recipes') }}">
                            <i class="fas fa-fw fa-utensils me-2"></i>
                            <span>Receitas</span></a>
                    </li>
                </ul>
            </nav>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content h-100">

                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3" 
                            data-bs-toggle="collapse" href="#collapseSidebar" role="button" aria-expanded="false" aria-controls="collapseSidebar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown justify-content-end">
                                <a class="nav-link dropdown-toggle bg-transparent"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                        <img class="img-profile rounded-circle"
                                            src="/assets/img/undraw_profile_1.svg">
                                </a>
                                <ul class="dropdown-menu p-2 me-3 border border-0 shadow">
                                    <li><a class="dropdown-item" href="{{ route('instructor.profile') }}">Perfil</a></li>
                                    <li><a class="dropdown-item" href="#"
                                        data-bs-toggle="modal" data-bs-target="#logoutModal">Terminar Sessao</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                            
                    <!-- Content Row -->
                    <div class="row">
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.modals.logout')
    @include('components.modals.delete')
    @include('components.scripts.get-id-to-delete')


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <!-- Swiper JS -->
        <script src="{{ asset('assets/js/swiper.js') }}"></script>
        <!-- jQuery JS -->
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <!-- Image Loader JS -->
        <script src="{{ asset('assets/js/imageloaded.js') }}"></script>
        <!-- Isotop JS -->
        <script src="{{ asset('assets/js/isotop.js')}}"></script>
        <!-- Magnify-popup -->
        <script src="{{ asset('assets/js/magnify-popup.min.js') }}"></script>
        <!-- sal.js -->
        <script src="{{ asset('assets/js/sal.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('assets/js/wow.js')}}"></script>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <!-- One Page Nav JS -->
        <script src="{{ asset('assets/js/jquery-one-page-nav.js')}}"></script>
        <!-- Modernizr JS -->
        <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
        <!-- JQuery UI JS-->
        <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
        <!-- Plyr JS -->
        <script src="{{ asset('assets/js/plyr.js')}}"></script>
        <!-- Jodit JS -->
        <script src="{{ asset('assets/js/jodit.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>