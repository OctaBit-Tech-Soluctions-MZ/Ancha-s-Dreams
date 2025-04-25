@extends('layouts.auth')

@section('title', 'Junte-se à Nossa Jornada Culinária')

@section('content')

        
    
    <div class="pt-3 mt-5">    
        <div class="container d-flex justify-content-center align-items-center p-5 mt-2 bg-grey-200 ">
            <div class="p-4 col card  card-auth">
                <h3 class="text-center">{{ __('Junte-se à Nossa Jornada Culinária') }}</h3>
                    
                    <x-validation-errors class="mb-4 alert alert-danger"/>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="name">Nome</label>
                                <input type="text" class="form-control" placeholder="Digite seu nome" id="name"
                                        name="name" :value="old('name')">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="surname" class="form-label">Apelido</label>
                                <input type="text" class="form-control" placeholder="Digite o seu apelido" id="surname"
                                    name="surname" :value="old('surname')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="nivel" class="form-label">Nivel de Habilidade</label>
                                <select name="nivel" id="nivel" class="form-select">
                                    <option value="">Selecione o seu nivel de Habilidade em culinaria</option>
                                    <option value="iniciante">Iniciante</option>
                                    <option value="intermediario">Intermediario</option>
                                    <option value="avançado">Avançado</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="phone_number" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" 
                                    placeholder="Digite o seu numero de telefone" :value="old('phone_number')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Digite seu email" id="email"
                                    name="email" :value="old('email')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="password">Senha</label>
                                <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password"
                                >
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="password_confirmation" >Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="Confirme sua senha" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>

                        {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
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
                        @endif --}}

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Ja tem uma conta?') }}
                            </a>

                            <button type='submit' class="ms-4 btn btn-primary">
                                {{ __('Registar') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
