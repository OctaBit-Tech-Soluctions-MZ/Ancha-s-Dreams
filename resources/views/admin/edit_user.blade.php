@extends('layouts.admin')

@section('title', 'Editar Dados '. $user->name .' | Admin')

@section('content')
    <div class="p-4">
        <div class="panel card shadow-sm border border-0 mb-3 p-3">
            <h1 class="h3 mb-0 text-gray-800 text-center">Formulario de Edicao de Dados</h1>
        </div>
        <div class="panel card shadow-sm border border-0">
            <div class="panel-body bio-graph-info p-3">
                <div class="card-body">
                    @if($errors->any())
                        <div style="color:red">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.users.update', ['id' => $user->id ]) }}">
                        @csrf
                        @method('PUT')
                        @include('components.forms.edit_user')
                        <div class="mt-4">
                            <button class="btn btn-primary btn-sm" type="submit">
                                {{ __('Editar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection