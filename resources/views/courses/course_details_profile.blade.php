@extends('layouts.profile')

@section('title', ' | Curso')

@section('profile-content')
<div class="panel card shadow border border-0 mb-3">
    <!-- Course Section Begin -->
    <section class="course-details spad">
        <div class="container">
            <div class="course__details__content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="course__details__pic set-bg" data-setbg="{{ asset('assets/img/courses/'.$course->course_photo_path) }}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $course->views }}</div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="course__details__text">
                            <div class="course__details__title">
                                <h3>{{ $course->name }}</h3>
                                <span>Instrutor: {{ $course->instructor->name }}</span>
                            </div>
                            <div class="course__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                            </div>
                            <p>{{ $course->description }}</p>
                            <div class="course__details__widget">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul>
                                            <li><span>Lancado em:</span> {{ $course->created_at->format('Y-m-d') }}</li>
                                            <li><span>Status:</span> {{ $course->status }}</li>
                                            <li><span>Categoria:</span> {{ $course->categoria }}</li>
                                            <li><span>Avaliacao:</span> {{ $course->rating}}</li>
                                            <li><span>Aulas:</span> 20</li>
                                            <li><span>Visualizacoes:</span> {{ $course->views }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="course__details__btn">
                                <a href="{{ route('profile.courses.update', ['slug' => $course->slug]) }}" class="buy-btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Course Section End -->

</div>
@endsection