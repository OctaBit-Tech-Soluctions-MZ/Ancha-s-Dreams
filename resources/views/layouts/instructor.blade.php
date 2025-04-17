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
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Trix Editor CSS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Sidebar CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sidebar.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">

    <!-- Course Details CSS -->
    @include('components.styles.courses')

    <!-- Profile Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">

</head>
<body>
    <div class="">
        <div id="wrapper">
            <!-- Sidebar -->
            <nav class="col-3 bg-dark vh-100 sidebar" id="collapseSidebar">
                <ul class="nav flex-column">
                     <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <img src="{{ asset('assets/img/navbar-logo.svg') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2 text-white">ALAGOANA</div>
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
                            <i class="fas fa-fw fa-book me-2"></i>
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
                        <div class="pt-2 pb-2 ps-5 pe-5 d-flex justify-content-between">
                            @php
                            $backUrl = getBackUrl();
                            @endphp
                            <a href="{{ $backUrl }}" class="btn btn-primary">Voltar</a>
                            <h3>@yield('page')</h3>
                        </div>
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