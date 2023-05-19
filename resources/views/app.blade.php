<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <link rel="icon" href="{{ asset('images/favicon.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,900&display=swap" rel="stylesheet">

        <!-- Importações de estilos CSS -->
        <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('src/fontawesome/css/all.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('styles')
    </head>
    <body>
        @if(request()->session()->has('cd_token'))
            <link href="{{ asset('css/header.css') }}" rel="stylesheet">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="navbar-header d-flex flex-wrap align-items-center justify-content-between py-3">
                            <a href="{{ route('reservation') }}" class="col-lg-2 col-5">
                                <img class="header-logo w-100" src="{{ asset('images/logo.png') }}" alt="Logo Digiliza">
                            </a>
                            <div class="col-lg-8 col-12 d-lg-block d-none">
                                <a href="{{ route('reservation') }}" class="px-5">Realizar reservas</a>
                                @if(request()->session()->get('user')['ic_admin'] == 1)
                                    <a href="{{ route('dashboard') }}">Painel de Controle</a>
                                @endif
                            </div>
                            <a href="{{ route('logout') }}" class="col-lg-2 col-12 justify-content-end align-items-center d-lg-flex d-none ">
                                Logout <i class="fa-solid fa-right-from-bracket ms-3"></i>
                            </a>
                            <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#conteudo-mobile" aria-controls="conteudo-mobile" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse conteudo-header-mobile" id="conteudo-mobile">
                        <div class="d-flex flex-column py-4">
                            <a href="{{ route('reservation') }}" class="mt-3">Realizar reservas</a>

                            @if(request()->session()->get('user')['ic_admin'] == 1)
                                <a href="{{ route('dashboard') }}" class="mt-3">Painel de Controle</a>
                            @endif

                            <a href="{{ route('logout') }}" class="col-12 justify-content-end align-items-center mt-3">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

            </header>
        @endif
         <!-- Conteúdo da página -->
        @yield('content')

        <!-- Importações de bibliotecas JavaScript -->
        <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('src/jquery/jquery.js') }}"></script>
        <script src="{{ asset('src/jquery/jquery.validation.js') }}"></script>
        <script src="{{ asset('src/fontawesome/js/all.min.js') }}"></script>
        <script src="{{ asset('src/sweetalert/sweetalert.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
