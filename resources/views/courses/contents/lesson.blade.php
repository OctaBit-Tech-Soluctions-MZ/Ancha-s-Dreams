@extends('layouts.profile')

@section('Video Aulas | ')

@section('profile-content')

        <div class="panel card shadow border border-0">
            <div class="d-flex justify-content-start p-3">
                <a href="{{ route('courses.lesson.add', ['slug' => $slug]) }}" class="btn btn-success btn-sm">Adicionar Aula</a>
            </div>
        </div>


@endsection