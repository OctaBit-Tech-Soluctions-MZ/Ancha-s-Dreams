@extends('layouts.auth')

@section('title', 'Login | ')

@section('content')
        
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        
        <div class="container d-flex justify-content-center align-items-center p-5 mt-2 bg-grey-200 ">
            <div class="p-4 col-6 card shadow  card-auth">
                <h3 class="text-center">Entrar</h3>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="email" value="{{ __('Email') }}" >Email</label>
                        <input type="email" class="form-control" placeholder="Digite seu email"  name="email" :value="old('email')" required autofocus autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password" value="{{ __('Password') }}">Senha</label>
                        <input type="password" class="form-control" placeholder="Digite sua senha" name="password" required autocomplete="current-password">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label for="remember_me" class="form-check-label text-dark">{{ __('Lembre deste Dispositivo') }}</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif

                        <x-button class="ms-4 btn btn-primary">
                            {{ __('Login') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
@endsection
