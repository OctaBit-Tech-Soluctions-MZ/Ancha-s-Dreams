@extends('layouts.instructor')

@section('title', 'Conteudos do Curso')

@section('content')

<main class="rbt-main-wrapper">

    <div class="rbt-create-course-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-12">
                    <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                        <div class="accordion" id="tutionaccordionExamplea1">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="accThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree" aria-expanded="false" aria-controls="accCollapseThree">
                                        Course Builder
                                    </button>
                                </h2>
                                <div id="accCollapseThree" class="accordion-collapse collapse" aria-labelledby="accThree">
                                    <div class="accordion-body card-body">
                                        <div class="accordion-item card mb--20">
                                            <h2 class="accordion-header card-header rbt-course" id="accOne1">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne1" aria-expanded="false" aria-controls="accCollapseOne1">Lesson
                                                    One</button>
                                                <span class="rbt-course-icon rbt-course-edit" data-bs-toggle="modal" data-bs-target="#UpdateTopic"></span><span class="rbt-course-icon rbt-course-del"></span>
                                            </h2>
                                            <div id="accCollapseOne1" class="accordion-collapse collapse" aria-labelledby="accOne1">
                                                <div class="accordion-body card-body" id="dnd1">
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                From Zero to Expert!</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">Difficult Things About
                                                                Education.</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">Five Things You Should Do In
                                                                Education.</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                From Zero to Expert!</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="gap-3 d-flex flex-wrap"><button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Lesson"><span class="icon-reverse-wrapper"><span class="btn-text">Lesson</span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Quiz"><span class="icon-reverse-wrapper"><span class="btn-text">Quiz</span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Assignment"><span class="icon-reverse-wrapper"><span class="btn-text">Assignments </span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                        </div>
                                                        <div class="mt-3 mt-md-0">
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"><span class="icon-reverse-wrapper"><span class="btn-text">Import Quiz </span><span class="btn-icon"><i class="feather-download"></i></span><span class="btn-icon"><i class="feather-download"></i></span></span>
                                                            </button>
                                                            <input type="file" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item card mb--20">
                                            <h2 class="accordion-header card-header rbt-course" id="accOne2">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne2" aria-expanded="false" aria-controls="accCollapseOne2">Lesson
                                                    two</button>
                                                <span class="rbt-course-icon rbt-course-edit" data-bs-toggle="modal" data-bs-target="#UpdateTopic"></span><span class="rbt-course-icon rbt-course-del"></span>
                                            </h2>
                                            <div id="accCollapseOne2" class="accordion-collapse collapse" aria-labelledby="accOne2">
                                                <div class="accordion-body card-body" id="dnd2">
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                From Zero to Expert!</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">Difficult Things About
                                                                Education.</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">Five Things You Should Do In
                                                                Education.</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                        <div class="col-10 inner d-flex align-items-center gap-2"><i class="feather-menu cursor-scroll"></i>
                                                            <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                From Zero to Expert!</h6>
                                                        </div>
                                                        <div class="col-2 inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                <li><i class="feather-trash"></i></li>
                                                                <li><i class="feather-edit" data-bs-toggle="modal" data-bs-target="#Quiz"></i></li>
                                                                <li><i class="feather-upload"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="gap-3 d-flex flex-wrap"><button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Lesson"><span class="icon-reverse-wrapper"><span class="btn-text">Lesson</span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Quiz"><span class="icon-reverse-wrapper"><span class="btn-text">Quiz</span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Assignment"><span class="icon-reverse-wrapper"><span class="btn-text">Assignments </span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span></button>
                                                        </div>
                                                        <div class="mt-3 mt-md-0">
                                                            <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"><span class="icon-reverse-wrapper"><span class="btn-text">Import Quiz </span><span class="btn-icon"><i class="feather-download"></i></span><span class="btn-icon"><i class="feather-download"></i></span></span>
                                                            </button>
                                                            <input type="file" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="rbt-btn btn-md btn-gradient hover-icon-reverse" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Add New Topic</span>
                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Modal Area  -->
    <div class="rbt-default-modal modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="feather-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="inner rbt-default-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="modal-title mb--20" id="exampleModalLabel">Add Topic</h5>
                                <div class="course-field mb--20">
                                    <label for="modal-field-1">Topic Name</label>
                                    <input id="modal-field-1" type="text">
                                    <small><i class="feather-info"></i> Topic titles are displayed publicly wherever
                                        required. Each topic may contain one or more lessons, quiz and
                                        assignments.</small>
                                </div>
                                <div class="course-field mb--20">
                                    <label for="modal-field-2">Topic Summary</label>
                                    <textarea id="modal-field-2"></textarea>
                                    <small><i class="feather-info"></i> Add a summary of short text to prepare
                                        students for the activities for the topic. The text is shown on the course
                                        page beside the tooltip beside the topic name.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-circle-shape"></div>
                <div class="modal-footer pt--30">
                    <button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Area  -->

    <!-- Start Topic Area  -->
    <div class="rbt-default-modal modal fade" id="UpdateTopic" tabindex="-1" aria-labelledby="UpdateTopicLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="feather-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="inner rbt-default-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="modal-title mb--20" id="exampleModalLabel">Update Topic</h5>
                                <div class="course-field mb--20">
                                    <label for="modal-field-1">Topic Name</label>
                                    <input id="modal-field-1" type="text">
                                    <small><i class="feather-info"></i> Topic titles are displayed publicly wherever
                                        required. Each topic may contain one or more lessons, quiz and
                                        assignments.</small>
                                </div>
                                <div class="course-field mb--20">
                                    <label for="modal-field-2">Topic Summary</label>
                                    <textarea id="modal-field-2"></textarea>
                                    <small><i class="feather-info"></i> Add a summary of short text to prepare
                                        students for the activities for the topic. The text is shown on the course
                                        page beside the tooltip beside the topic name.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-circle-shape"></div>
                <div class="modal-footer pt--30">
                    <button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topic Area  -->

    {{-- Modal Blade Components --}}
        @include('components.modals.lesson')
        @include('components.modals.quiz')
        @include('components.modals.exam')
    {{-- /Modal Blade Components --}}

</main>

@endsection