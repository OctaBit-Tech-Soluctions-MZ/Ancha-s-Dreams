@extends('layouts.instructor')

@section('Perfil | '.$user->name)

@section('content')

        <div class="container bootstrap snippets bootdey" style="font-size: 13px;">
            <div class="row ps-3 pe-3">
                <div class="profile-nav col-md-3">
                    <div class="panel card shadow border border-0">
                        <div class="user-heading round bg-dark">
                            <a href="#">
                                <img src="{{ asset('/assets/img/undraw_profile_1.svg') }}" alt="{{ $user->name }}">
                            </a>
                            <h1>{{ $user->name }}</h1>
                        </div>
                        <ul class="nav flex-column nav-pills">
                            <li class="nav-item">
                                <a class="nav-link rounded-0" href="{{ route('instructor.profile.edit') }}">
                                    <i class="fa fa-edit me-3"></i> Editar Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" href="{{ route('instructor.profile.password') }}">
                                    <i class="fa fa-lock me-3"></i> Mudar Senha</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="profile-info col-md-9">
                    @include('components.profile.user_details')
                </div>
            </div>
        </div>

@endsection