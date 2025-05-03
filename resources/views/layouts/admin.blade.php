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
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
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
                    <x-ancha-dreams-taste.side-nav-item :route="route('admin')" :icon="'uil-home'"
                        :name="'Dashboard'" />
                    <x-ancha-dreams-taste.side-nav-item-toggle :icon="'uil-users-alt'"
                        :keyname="'Utilizadores'">
                        <li><a href="{{route('users.list')}}" wire:navigate>Listar utilizadores</a></li>
                        <li><a href="" wire:navigate>Registar Instrutores</a></li>
                        <li><a href="" wire:navigate>Registar Administradores</a></li>
                    </x-ancha-dreams-taste.side-nav-item-toggle>
                </x-slot:nav_item>
            </x-ancha-dreams-taste.sidebar>
            @endpersist
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @persist('header')
                    <x-ancha-dreams-taste.header :role="'administrador'" />
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
    <script src="{{ asset('admin/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/demo.dashboard-projects.js') }}"></script>

    <!-- third party js -->

    <script>
        const editor = Jodit.make('#editor', {
    buttons: ['bold', 'italic', 'underline', '|', 'ul', 'ol']
  });
    </script>
</body>

</html>