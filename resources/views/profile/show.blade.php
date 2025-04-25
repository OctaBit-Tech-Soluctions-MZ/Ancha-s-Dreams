@extends('layouts.auth')

@section('title', 'Perfil')

@section('content')
<div class="container bootstrap snippets bootdey" style="font-size: 13px;">
    <div class="row">
        @include('components.profile.student')
        <div class="profile-info col-md-9">
            <div class="panel card shadow border border-0">
                <div class="bio-graph-heading bg-dark">
                    Aprendendo, cozinhando e evoluindo! Aqui para explorar novos sabores e aprimorar minhas habilidades culinárias.
                </div>
                <div class="panel-body bio-graph-info p-3">
                    <h1>Perfil do Utilizador</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>Nome Completo </span>: {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Tipo de Conta </span>: {{ $role->role_name }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Email </span>: {{ Auth::user()->email }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Telefone </span>: {{ Auth::user()->phone_number }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Nivel </span>: {{ Auth::user()->nivel }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Status </span>: <span class="bg-success p-1 text-white text-center text-uppercasec">{{ Auth::user()->status }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6 p-3">
                        <div class="panel card shadow border border-0 p-2">
                            <div class="panel-body">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;">
                                        <canvas width="100" height="100px"></canvas>
                                        <input class="knob" data-width="100" data-height="100" 
                                        data-displayprevious="true" data-thickness=".2" 
                                        data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" value="35" 
                                        style="width: 54px; height: 33px; position: absolute; 
                                        vertical-align: middle; margin-top: 33px; margin-left: -77px; 
                                        border: 0px; font-weight: bold; font-style: normal; 
                                        font-variant: normal; font-stretch: normal; font-size: 20px; 
                                        line-height: normal; font-family: Arial; text-align: center; 
                                        color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; 
                                        background: none;">
                                    </div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="red">Meus Cursos</h4>
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="panel card shadow border border-0 p-2">
                            <div class="panel-body">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="terques">ThemeForest CMS </h4>
                                    <p>Started : 15 July</p>
                                    <p>Deadline : 15 August</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="panel card shadow border border-0 p-2">
                            <div class="panel-body">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="green">VectorLab Portfolio</h4>
                                    <p>Started : 15 July</p>
                                    <p>Deadline : 15 August</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="panel card shadow border border-0 p-2">
                            <div class="panel-body">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="purple">Adobe Muse Template</h4>
                                    <p>Started : 15 July</p>
                                    <p>Deadline : 15 August</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection