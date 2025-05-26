<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ancha´s Dream Taste') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

    <!-- Google fonts-->
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/datatables/datatables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/print.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/jodit/jodit.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
</head>

<body
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <script src="{{ asset('assets/js/print.min.js') }}"></script>
    <div class="">
        <div class="wrapper">
            @persist('sidebar')
            <x-ancha-dreams-taste.sidebar>
                <x-slot:nav_item>
                    <x-ancha-dreams-taste.side-nav-item :route="route('admin')" :icon="'uil-home'"
                        :name="'Dashboard'" />
                    {{--
                    <x-ancha-dreams-taste.side-nav-item :route="route('books.list')" :icon="'uil-book'"
                        :name="'Livros'" /> --}}
                    <x-ancha-dreams-taste.side-nav-item :route="route('courses.admin')" :icon="'uil-award'"
                        :name="'Cursos'" />
                    <x-ancha-dreams-taste.side-nav-item :route="route('products.list')" :icon="'uil-utensils-alt'"
                        :name="'Produtos'" />
                    <x-ancha-dreams-taste.side-nav-item-toggle :icon="'uil-users-alt'" :keyname="'Utilizadores'">
                        <li><a href="{{ route('users.list') }}" wire:navigate>Listar utilizadores</a></li>
                        <li><a href="{{ route('users.instructor') }}" wire:navigate>Registar Instrutores</a></li>
                        <li><a href="{{ route('users.admin') }}" wire:navigate>Registar Administradores</a></li>
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

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Definições</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar="">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>


                <!-- Width -->
                <h5 class="mt-4">Largura</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check"
                        checked="">
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check"
                        checked="">
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                        id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable"
                        id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Voltar para o padrão</button>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- Modals Components -->
    <x-ancha-dreams-taste.modals.logout-modal />
    <x-ancha-dreams-taste.modals.confirm-modal :action="$action ?? ''"/>


    <!-- bundle -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/demo.dashboard-projects.js') }}"></script>
    <script src="{{ asset('assets/fonts/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert/sweetalert.init.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables.js') }}"></script>

</body>

</html>