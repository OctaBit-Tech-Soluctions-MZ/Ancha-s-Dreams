@extends('layouts.instructor')

@section('title', 'Meus Cursos')
 
@section('content')
                <div class="p-2">
                    {{-- Alert Blade Component --}}
                    <x-show-alert />
                    
                    <div class="rbt-tutor-information-right">
                        <div class="d-flex justify-content-start p-4">
                            <a class="rbt-btn btn-md hover-icon-reverse" href="{{ route('instructor.courses.register') }}">
                                <span class="icon-reverse-wrapper">
                                <span class="btn-text ms-2 me-2">Registar novo curso</span>
                                <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="p-3">
                    @if (count($courses) == 0 && $search)
                        <div class="p-3 text-center">
                            nao foi possivel encontrar um curso com {{ $search }} <a href="{{ route('instructor.courses') }}">Ver todos Cursos</a>
                        </div>
                    @elseif (count($courses) == 0)
                        <div class="p-3">
                            <div class="alert alert-danger">
                                Nenhum curso foi registado
                            </div>
                        </div>
                    @else
                        <!-- DataTales Example -->
                        <div class="panel-body bio-graph-info">
                            <div>
                                <div class="d-flex gap-2">
                                    <div class="row g-5">
                                        {{-- Course Card Blade Component. resources/components/course-card-instructor.blade.php --}}
                                        <x-course-card-instructor :courses="$courses"  />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                {{ $courses->onEachSide(3)->links() }}
                            </div>
                        </div>
                    @endif
                    </div>
                </div>

@endsection