@extends('layouts.instructor')

@section('title', 'Detalhes | '.$course->name)

@section('content')
            <div class="p-4">
                <div class="panel card shadow border border-0">
                    <!-- Course Section Begin -->
                    <section class="course-details spad p-0">
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
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                            <p>{!! $course->description !!}</p>
                                            <div class="course__details__widget">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <ul>
                                                            <li><span>Lancado em:</span> {{ $course->created_at->format('Y-m-d') }}</li>
                                                            <li><span>Status:</span> {{ $course->status }}</li>
                                                            <li><span>Categoria:</span> {{ $course->category }}</li>
                                                            <li><span>Avaliacao:</span> {{ $course->rating}}</li>
                                                            <li><span>Aulas:</span> 20</li>
                                                            <li><span>Visualizacoes:</span> {{ $course->views }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__details__btn">
                                                <a href="{{ route('instructor.courses.lesson', ['slug' => $course->slug]) }}" class="buy-btn btn-primary"><i class="fa fa-edit"></i> Video Aulas</a>
                                                <a href="" class="buy-btn btn-success fw-bolder">Alunos Inscritos</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Course Section End -->

                </div>
            </div>
@endsection