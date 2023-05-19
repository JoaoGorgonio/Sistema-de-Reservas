@extends('app')

@section('title', 'Login - Sistema de Reservas')

@section('styles')
    <link href="{{ asset('css/system/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="login">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-lg-6 d-lg-block d-none login-banner">
                    <img src="{{asset('images/login/banner.jpg')}}" alt="Restaurante" class="vh-100 object-fit-cover w-100">
                </div>
                <div class="col-lg-6 col-12 login-container d-flex flex-column justify-content-center align-items-center vh-100">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" class="col-xxl-3 col-lg-4 col-6 mb-5">
                    <form class="login-form d-flex flex-column p-5 col-xxl-6 col-xl-7 col-lg-9 col-10 rounded-3" method="POST" action="{{ route('auth') }}">
                        @csrf
                        <h1 class="text-center">Acessar Conta</h1>
                        <div class="mt-5 col-12">
                            <label for="login-email">E-mail:</label>
                            <input type="email" name="email" class="col-12 rounded-1 p-2" id="login-email">
                        </div>
                        <div class="mt-5 col-12">
                            <label for="login-password">Senha:</label>
                            <input type="password" name="password" class="col-12 rounded-1 p-2" id="login-password">
                        </div>
                        <button class="mt-5 py-2 rounded-3 enviar-form" type="submit">Entrar</button>
                        <span id="error-message" class="error-message"></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const loginRoute = '{{ route('auth') }}';
    </script>
    <script src="{{ asset('js/system/login.js') }}"></script>
@endsection
