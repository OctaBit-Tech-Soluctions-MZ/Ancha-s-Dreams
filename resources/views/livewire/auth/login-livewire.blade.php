    <div class="mt--90">
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-right">
                            <div class="w-100 p-3">
                                <h3 class="text-center account-subtitle">Acesse Sua Conta</h3>
                                @if (session('warning'))
                                    <div class="alert alert-warning">{!! session('warning') !!}</div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="rbt-course-field-wrapper rbt-default-form">  
                                        <div class="col-md-12 course-field mb--15">
                                            <label for="email" value="{{ __('Email') }}" >Email</label>
                                            <input type="email" class="form-control" placeholder="Digite seu email"  name="email">
                                            @error('email')
                                                <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i> 
                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            {{ $loop->index + 1 <= 1? $error : ''}}
                                                        @endforeach
                                                    @endif
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="rbt-course-field-wrapper rbt-default-form"> 
                                            <div class="col-md-12 course-field mb--15">
                                                <label class="form-label" for="password" value="{{ __('Password') }}">Palavra-Passe</label>
                                                <input type="password" class="form-control" placeholder="Digite sua palavra-passe" name="password">
                                                @error('password')
                                                    <span class="color-danger pt-3 fs-7"><i class="feather-alert-triangle"></i> 
                                                        @if ($errors->any())
                                                            @foreach ($errors->all() as $error)
                                                                {{ $loop->index + 1 > 1? $error : ''}}
                                                            @endforeach
                                                        @endif
                                                    </span>    
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                        <label for="remember_me" class="form-check-label text-dark">{{ __('Lembre deste Dispositivo') }}</label>
                                    </div>
    
                                    <div class="d-flex align-items-center justify-content-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                        @endif
    
                                        <button type="submit" class="ms-4 btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="login-left" style="background: #727cf5">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/culinary_classes_online.png')}}" alt="culinary_classes_online">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>