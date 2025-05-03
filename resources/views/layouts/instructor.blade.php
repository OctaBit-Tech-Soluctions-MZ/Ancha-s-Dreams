<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ancha´s Dream Taste') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/jodit/jodit.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="">
        <div class="wrapper">
            @persist('sidebar')
            <x-ancha-dreams-taste.sidebar>
                <x-slot:nav_item>
                    <x-ancha-dreams-taste.side-nav-item :route="route('dashboard')" :icon="'uil-home'"
                        :name="'Dashboard'" />
                    <x-ancha-dreams-taste.side-nav-item :route="route('courses.instructor')" :icon="'uil-award'"
                        :name="'Meus cursos'" />
                </x-slot:nav_item>
            </x-ancha-dreams-taste.sidebar>
            @endpersist
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @persist('header')
                    <x-ancha-dreams-taste.header :role="'instructor'" />
                    @endpersist
                    <!-- Start Content-->
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Components -->
    <x-ancha-dreams-taste.modals.logout-modal />


    <!-- bundle -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/jodit/jodit.min.js')}}"></script>
    <script src="{{ asset('admin/js/pages/demo.toastr.js') }}"></script>
    <!-- Typehead -->
    <script src="{{ asset('admin/js/vendor/handlebars.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendor/typeahead.bundle.min.js') }}"></script>
    <!-- Demo -->
    <script src="{{ asset('admin/js/pages/demo.typehead.js') }}"></script>
    <!-- Timepicker -->
    <script src="{{ asset('admin/js/pages/demo.timepicker.js') }}"></script>

    <script>
        const editor = Jodit.make('#editor', {
    buttons: ['bold', 'italic', 'underline', '|', 'ul', 'ol']
  });
    </script>
</body>

</html>