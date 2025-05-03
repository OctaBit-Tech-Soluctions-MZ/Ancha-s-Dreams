<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <script src="https://unpkg.com/scrollreveal"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">

            <livewire:header :bg="$headerBg ?? ''" />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <x-ancha-dreams-taste.footer/>
        </div>

        @stack('modals')

        @livewireScripts
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
