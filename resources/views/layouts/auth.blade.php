<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | @auth {{ Auth::user()->name }} @endauth</title>

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

        <!-- Course Details CSS -->
        @include('components.styles.courses')

        <style>
            .nav-link span, .btn-tx span{
                font-size: 0.78rem
            }
            .bg-nav {
                background: #212529 !important;
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
        @include('components.navigation-menu')
        <div class="p-5 mt-4">       
            @yield('content')
        </div>
        @include('components.footer')
        

        @auth
            @include('components.modals.logout')
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

