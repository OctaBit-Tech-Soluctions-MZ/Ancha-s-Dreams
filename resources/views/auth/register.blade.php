@extends('layouts.auth')

@section('title', 'Nova Conta | ')

@section('content')

        
        
        <div class="container d-flex justify-content-center align-items-center p-5 mt-2 bg-grey-200 ">
            <div class="p-4 col-6 card shadow  card-auth">
                <h3 class="text-center">{{ __('Nova Conta') }}</h3>
                    
                    <x-validation-errors class="mb-4 alert alert-danger"/>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="name">Nome</label>
                            <input type="text" class="form-control" placeholder="Digite seu nome" id="name"
                                name="name" :value="old('name')" required autofocus autocomplete="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Digite seu email" id="email"
                                name="email" :value="old('email')" required autocomplete="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Senha</label>
                            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password"
                                required autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation" >Confirmar Senha</label>
                            <input type="password" class="form-control" placeholder="Confirme sua senha" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Ja tem uma conta?') }}
                            </a>

                            <x-button class="ms-4 btn btn-primary">
                                {{ __('Registar') }}
                            </x-button>
                        </div>
                    </form>
            </div>
        </div>
@endsection
