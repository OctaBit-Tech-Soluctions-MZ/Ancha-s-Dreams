<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" type="text/css" />
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/icons.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}" type="text/css" id="light-style">
    <link rel="stylesheet" href="{{ asset('assets/star-rating/star-rating-svg.css') }}">
    @auth
    <style>
        @media (max-width : 568px) {
            #logo-nav {
                display: none;
            }
        }

        .star i {
            font-size: 25px;
            color: #ccc;
            transition: color 0.2s ease-in-out;
        }

        .star:hover~.star i {
            color: #ccc !important;
        }

        .star:hover i,
        .star:hover~.star i {
            color: gold !important;
        }

        .star.selected i {
            color: gold;
        }
    </style>
    @endauth
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <livewire:header :bg="$headerBg ?? ''" />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <x-ancha-dreams-taste.footer />
    </div>


    <!-- Modals Components -->
    <x-ancha-dreams-taste.modals.logout-modal />

    <x-ancha-dreams-taste.floating-button :title="'Carrinho de compra'" :route="route('cart')"
        :icon="'feather-shopping-cart'" />

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{ asset('assets/fonts/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.min.js') }}"></script>
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