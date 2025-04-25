@extends('layouts.auth')

@section('title', $course->name)

@section('content')


<!-- Course Section Begin -->
<section class="course-details spad">
    <div class="container">
        <div class="course__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="course__details__pic set-bg" data-setbg="{{ asset('assets/img/courses/'.$course->course_photo_path) }}">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> {{ $course->views }}</div>
                    </div>
                </div>
                <div class="col-lg-9">
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
                                <a href="#"><i class="fa fa-star half-o"></i></a>
                            </div>
                        </div>
                        <p>{!! $course->description !!}</p>
                        <div class="course__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Lançado:</span>@php
                                            echo humanTime($course->created_at->format('Y-m-d'));
                                        @endphp </li>
                                        <li><span>Status:</span> {{ $course->status }}</li>
                                        <li><span>Categoria:</span> {{ $course->category }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Avaliação:</span> {{ $course->rating}}</li>
                                        <li><span>Aulas:</span> 20</li>
                                        <li><span>Visualizaçoes:</span> {{ $course->views }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="course__details__btn">
                            <a href="{{ route('courses.watch', ['slug' => $course->slug]) }}" class="buy-btn"><span>Aprenda Agora</span> <i
                                class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="course__details__review">
                        <div class="section-title">
                            <h5>Comentarios</h5>
                        </div>
                        <div class="course__review__item">
                            <div class="course__review__item__pic">
                                <img src="/assets/img/undraw_profile_1.svg" alt="">
                            </div>
                            <div class="course__review__item__text bg-dark">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                    </div>
                    <div class="course__details__form p-2">
                        <div class="section-title">
                            <h5>Seu Comentario</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Seu comentario" class="card border"></textarea>
                            <button type="submit" class="bg-primary"><i class="fa fa-location-arrow"></i> Comentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Course Section End -->

    
@endsection