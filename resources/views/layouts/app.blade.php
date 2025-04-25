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

        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        <!-- Loader CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">


        <style>
            .nav-link span, .btn-tx span{
                font-size: 0.78rem
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

        <!-- Masthead-->
        <header class="masthead">
            <div class="overlay"></div>
            <div class="container texto">
                <div class="masthead-subheading">@yield('subheading')</div>
                <div class="masthead-heading text-uppercase">@yield('headingtext')</div>
            </div>
        </header>

        @yield('content')

        <!-- Footer-->
        @include('components.footer')

        @Auth
            @include('components.modals.logout')
            @include('components.modals.cart')
        @endauth

        {{-- custom js --}}
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @auth
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script>
            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();
                let btn = $(this);
            
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: btn.data('id'),
                        name: btn.data('name'),
                        price: btn.data('price'),
                        photo: btn.data('photo')
                    },
                    beforeSend: function () {
                        btn.text('Adicionando...');
                    },
                    success: function (response) {
                        alert(response.success);
                        btn.text('Adicionar ao Carrinho');
                    },
                    error: function () {
                        alert('Erro ao adicionar. Tente novamente.');
                        btn.text('Adicionar ao Carrinho');
                    }
                });
            });
            </script>
            @endauth
</body>
</html>