@extends('layouts.app')

@section('title','Recuperando a senha')

@section('header_bg', 'bg-dark')

@section('content')
    
    <div class="pt-3 mt-5">
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <div class="row justify-content-center align-items-center p-5 mb-3">
            <div class="col-sm-6 p-5 card border border-0 shadow">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Esqueceu sua senha? Sem problemas. Desde que saiba o endereço de email da tua conta e nos enviaremos um email com o link para recuperar sua senha , por favor insira teu email.') }}
                </div>
                <x-validation-errors class="mb-4 alert alert-danger" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="block">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary btn-sm">
                            {{ __('Enviar Link de Recuperação de senha') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection