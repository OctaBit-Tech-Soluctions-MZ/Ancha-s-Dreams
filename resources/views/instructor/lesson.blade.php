@extends('layouts.instructor')

@section('title', $course->name .' | Aulas')

@section('content')

<main class="rbt-main-wrapper">

    <div class="rbt-create-course-area bg-color-white">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-12">
                    <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                        <div class="accordion p-2" id="tutionaccordionExamplea1">
                            
                            <div>
                                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"
                                     href="{{route('instructor.lessons.add', ['slug'=> $course->slug])}}">
                                     <span class="icon-reverse-wrapper g-2">
                                        <span class="btn-text ms-1 me-1">Nova Aula</span>
                                        <span class="btn-icon">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                        <span class="btn-icon">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <!-- Start Course Content  -->
                            <div class="course-content rbt-shadow-box coursecontent-wrapper mt-3" id="coursecontent">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">{{ $course->name }} | Aulas</h4>
                                    </div>
                                    <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                        <div class="accordion" id="accordionExampleb2">
                                            @foreach($course->contents as $content)
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo1">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                                        data-bs-target="#collapseTwo{{ $loop->index + 1 }}" aria-expanded="true" aria-controls="collapseTwo{{ $loop->index + 1}}">{{$content->title}} <span class="rbt-badge-5 ml-1">
                                                                {{ $content->duration}}</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo{{ $loop->index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-course-main-content list-unstyled p-2">
                                                                <li>
                                                                    <span class="d-flex justify-content-between">
                                                                        <div class="course-content-left">
                                                                            <i class="fas fa-play-circle me-2"></i> <span class="text-grey fw-bolder">{{ $content->title}}</span>
                                                                        </div>
                                                                        <div class="course-content-right d-flex gap-2">
                                                                            <a class="rbt-badge variation-03 bg-primary-opacity"><i class="fas fa-edit me-2"></i>   Editar</a>
                                                                            <a class="rbt-badge variation-03 bg-primary-opacity"><i class="fas fa-trash me-2"></i>   Excluir</a>
                                                                        </div>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                                <div class="gap-3 d-flex flex-wrap">
                                                                    <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" 
                                                                        href="{{ route('instructor.quiz', ['slug' => $content->slug]) }}">
                                                                        <span class="icon-reverse-wrapper">
                                                                            <span class="btn-text me-1 ms-1">Novo Quiz</span>
                                                                            <span class="btn-icon"><i class="fas fa-plus-square"></i></span>
                                                                            <span class="btn-icon"><i class="fas fa-plus-square"></i></span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Course Content  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection