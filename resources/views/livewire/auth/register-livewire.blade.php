<div class="mt--90 ">
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left" style="background: #727cf5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/culinary_classes_online.png')}}" alt="culinary_classes_online">
                        </div>
                    </div>
                    <div class="login-right">
                        <div class="w-100 p-3">
                            <h3 class="text-center account-subtitle">{{ __('Junte-se à Nossa Jornada Culinária') }}</h3>
                            <form method="POST" wire:submit.prevent='create'>
                                @csrf
                                <div class="rbt-course-field-wrapper rbt-default-form">
                                    <div class="row">    
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-1">Nome</label>
                                            <input id="field-1" type="text" placeholder="Primeiro e segundo nome" wire:model="name">
                                            @error('name')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-2">Sobrenome</label>
                                            <input id="field-2" type="text" placeholder="Sobrenome" wire:model="surname">
                                            @error('surname')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-3">Telefone</label>
                                            <input id="field-3" type="text" placeholder="Telefone" wire:model="phone_number">
                                            @error('phone_number')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-4">Email</label>
                                            <input id="field-4" type="text" placeholder="Endereço de E-Mail" wire:model="email">
                                            @error('email')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-5">Palavra-Passe</label>
                                            <input id="field-5" type="password" placeholder="Palavra-Passe" wire:model="password">
                                            @error('password')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 course-field mb--15">
                                            <label for="field-6">Confirmação da Palavra-Passe</label>
                                            <input id="field-6" type="password" placeholder="Confirmação da Palavra-Passe" wire:model="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i>  {{ $message }}</span>
                                            @enderror
                                        </div>
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
                                <div class="d-flex align-items-center justify-content-end gap-3 mt-4">
                                    <a class="rbt-btn-link text-decoration" href="{{ route('login') }}">
                                        {{ __('Acesse a sua conta aqui') }}
                                    </a>
                                    
                                    <button type='submit' class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2">
                                        {{ __('Registar') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
