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
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/profile.css') }}">
        <style>
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
        <!-- Dark Mode Switcher -->
        <script src="{{ asset('assets/js/js.cookie.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.style.switcher.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-appear.js') }}"></script>
        <script src="{{ asset('assets/js/odometer.js') }}"></script>
        <script src="{{ asset('assets/js/backtotop.js') }}"></script>

        <script src="{{ asset('assets/js/waypoint.min.js') }}"></script>
        <script src="{{ asset('assets/js/easypie.js') }}"></script>
        <script src="{{ asset('assets/js/text-type.js') }}"></script>
        <script src="{{ asset('assets/js/paralax-scroll.js') }}"></script>
        <script src="{{ asset('assets/js/paralax.min.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

</html>

