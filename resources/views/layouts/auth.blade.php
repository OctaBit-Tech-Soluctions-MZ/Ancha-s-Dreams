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
        <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">

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
                background: #484b4e !important;
                /* background: linear-gradient(135deg, #f9f9f9, #212529) !important; */
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
        <!-- content -->      
        @yield('content')
        <!-- footer -->
        @include('components.footer')
        <!-- Modal -->
        @auth
            @include('components.modals.logout')
            @include('components.modals.cart')
            <script src="{{ asset('assets/js/cart.js') }}"></script>
        @endauth

        
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <!-- -->
        <script src="{{ asset('assets/js/jquery-one-page-nav.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
</html>

