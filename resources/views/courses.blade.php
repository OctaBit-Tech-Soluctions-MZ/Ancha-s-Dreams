@extends('layouts.app')

@section('title', 'Cursos')

@section('content')

    <x-masthead :subHeading="'Os nossos cursos de culinária'" :heading="'São 100% digitais e com um método inovador.'"/>
        <!-- Seção de Cursos -->
        <section class="p-1">
            <div class="container mt-4">
                <div class="container text-center">
                    <h5 class="mb-4 mt-4">
                        <strong>CONHEÇA OS CURSOS E VEJA O QUE VOCÊ VAI APRENDER</strong>
                    </h5>
                    {{-- Filter Blade Components path:resource/components/filter.blade.php --}}
                    {{-- Start --}}
                        <x-filter :categories="$categories" :route="route('courses')" :placeholder="'o seu curso'" :person="'Instrutor'"/>
                    {{-- End --}}
                    @if (empty($courses))
                        <div class="alert alert-danger">
                            Nenhum Curso foi registado
                        </div>
                    @else
                        <div class="row g-2">
                        {{-- Courses Card Blade Components path:resource/components/course-card.blade.php --}}
                        {{-- Start --}}
                            @foreach($courses as $course)
                                <x-course-card :course="$course"/>
                            @endforeach
                        {{-- End --}}
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            {{ $courses->links() }}
                        </div>
                    @endif
                </div>
            </div>
    </section>
@endsection
