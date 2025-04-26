@extends('layouts.instructor')

@section('title', 'Criação de um Quiz')

@section('content')

<div class="p-5">
    <div class="inner rbt-default-form">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="modal-title mb--20" id="LessonLabel">Quiz</h5>
                <div class="course-field quiz-modal mb--40">
                    <div class="d-flex justify-content-between"><span>Informações sobre o Quiz</span><span>Questões</span><span>Definições</span></div>
                    <div class="position-relative m-4">
                        <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="33.3333" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 33.3333%;"></div>
                        </div>
                        <button type="button" class="position-absolute top-0 start-0 translate-middle btn quiz-modal-btn quiz-modal__active">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" class="position-absolute top-0 start-50 translate-middle btn quiz-modal-btn">2</button>
                        <button type="button" class="position-absolute top-0 start-100 translate-middle btn quiz-modal-btn btn-secondary">3</button>
                    </div>
                </div>
                <form class="tabs-1" id="quiz-form">
                    <div id="question-1" class="question" style="display: block;">
                        <div class="course-field mb--20"><label for="modal-field-1">Titulo do Quiz</label><input id="modal-field-1" type="text" placeholder="digite o titulo do quiz aqui..." name="title"></div>
                        <div class="course-field mb--20"><label for="modal-field-2">Sobre o Quiz
                                </label><textarea id="modal-field-2" name="summary"></textarea><small><i class="feather-info"></i> Add a summary of short text to prepare
                                students for the activities for the Quiz. The text is shown on the
                                course page beside the tooltip beside the
                                Quiz name.</small></div>
                    </div>
                    <div id="question-2" class="question" style="display: none;">
                        <div class="content">
                            <div class="course-field mb--20">
                                <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                    <div class="inner d-flex align-items-center gap-2">
                                        <h6 class="rbt-title mb-0">Question No.01</h6>
                                    </div>
                                    <div class="inner">
                                        <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                            <li><span>Single Choice</span></li>
                                            <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i class="feather-edit"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" type="button"><i class="feather-edit-2"></i> Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                            Delete</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                    <div class="inner d-flex align-items-center gap-2">
                                        <h6 class="rbt-title mb-0">Question No.02</h6>
                                    </div>
                                    <div class="inner">
                                        <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                            <li><span>True/False</span></li>
                                            <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i class="feather-edit"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" type="button"><i class="feather-edit-2"></i> Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                            Delete</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                    <div class="inner d-flex align-items-center gap-2">
                                        <h6 class="rbt-title mb-0">Question No.03</h6>
                                    </div>
                                    <div class="inner">
                                        <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                            <li><span>Multi Choice</span></li>
                                            <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i class="feather-edit"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" type="button"><i class="feather-edit-2"></i> Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                            Delete</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="course-field">
                                <button class="rbt-btn btn-active hover-icon-reverse rbt-sm-btn-2 btn-1" type="button" id="next-btn-2">
                                    <span class="icon-reverse-wrapper"><span class="btn-text">Add
                                            Question</span><span class="btn-icon"><i class="feather-plus-square"></i></span><span class="btn-icon"><i class="feather-plus-square"></i></span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="question-3" class="question" style="display: none;">
                        <div class="content">
                            <div class="course-field mb--20">
                                <label for="modal-field-3">Write your
                                    question here</label>
                                <input id="modal-field-3" type="text" placeholder="Question">
                            </div>
                            <div class="course-field mb--20">
                                <h6>Select your question type</h6>
                                <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                    <div class="dropdown bootstrap-select w-100"><select id="questionType" class="w-100">
                                        <option selected="selected">True/False</option>
                                        <option>Single Choice </option>
                                        <option>Multiple Choice </option>
                                        <option>Open Ended</option>
                                        <option>Fill in the Blanks</option>
                                        <option>Sort Answer</option>
                                        <option>Matching</option>
                                        <option>Image Matching</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5 mt--20">
                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckAnswer"><label class="form-check-label" for="switchCheckAnswer">Answer
                                            Required</label></div>
                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckRandomize"><label class="form-check-label" for="switchCheckRandomize">Randomize</label></div>
                                </div>
                            </div>
                            <div class="course-field mb--20">
                                <label for="modal-field-3">Point(s) for
                                    this answer</label>
                                <div class="d-flex align-items-center gap-5 mb--20">
                                    <div class="content"><input class="mb-0" id="modal-field-3" type="text" placeholder="set the mark ex. 10">
                                    </div>
                                </div>
                            </div>
                            <div class="course-field rbt-lesson-rightsidebar mt--20">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="rbt-form-check">
                                            <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-single-1">
                                            <label class="form-check-label" for="rbt-single-1">True</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="rbt-form-check">
                                            <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-single-2">
                                            <label class="form-check-label" for="rbt-single-2">False</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-field mt--20">
                                <label for="modal-field-3">Answer title</label>
                                <input id="modal-field-3" type="text" placeholder="title">
                                <div class="rbt-create-course-thumbnail upload-area mt--20">        
                                    <button class="rbt-btn rbt-sm-btn-2 mt--20" type="button">Update Answer</button>
                                </div>
                            </div>    
                        </div>
                    </div>                
                       <div id="question-4" class="question" style="display: none;">
                        
                            <div class="course-field mb--20"><label for="modal-field-3">Time
                                    Limit</label>
                                <div class="d-flex flex-wrap align-items-center gap-5">
                                    <div class="content"><input class="mb-0" id="modal-field-3" type="number" value="0"></div>
                                    <div class="content">
                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                            <div class="dropdown bootstrap-select w-100"><select class="w-100">
                                                <option selected="selected">Weaks</option>
                                                <option>Day </option>
                                                <option>Hour </option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-7" aria-haspopup="listbox" aria-expanded="false" title="Weaks"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Weaks</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-7" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckAnswerTwo2"><label class="form-check-label" for="switchCheckAnswerTwo2">Hide quiz
                                            time - display</label></div>
                                </div><small><i class="feather-info"></i> Time limit for this quiz.
                                    0 means no time limit.</small>
                            </div>
                            <div class="course-field"><label for="modal-field-3">Quiz Feedback
                                    Mode</label><small>(Pick the quiz system"s
                                    behaviour on choice based questions.)</small>
                                <div class="d-flex flex-column gap-4 mt--10">
                                    <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                        <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio1"><label class="form-check-label h-auto" for="rbt-radio1">
                                            <div class=""><span>Default</span></div>
                                            <div class=""><span>Answers shown after quiz is finished
                                                </span></div>
                                        </label>
                                    </div>
                                    <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                        <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio2"><label class="form-check-label h-auto" for="rbt-radio2">
                                            <div class=""><span>Reveal Mode</span></div>
                                            <div class=""><span>Show result after the attempt.
                                                </span></div>
                                        </label>
                                    </div>
                                    <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                        <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio3"><label class="form-check-label h-auto" for="rbt-radio3">
                                            <div class=""><span>Retry Mode</span></div>
                                            <div class=""><span>Reattempt quiz any number of times.
                                                    Define Attempts Allowed below.</span></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="course-field mt--20">
                                <div class="col-xl-8"><label for="modal-field-4">Passing Grade
                                        (%)</label><input class="mb-0" id="modal-field-4" type="number" value="50"><small><i class="feather-info"></i>
                                        Time limit for this quiz. 0 means no time
                                        limit.</small></div>
                            </div>
                            <div class="course-field mt--20">
                                <div class="col-xl-8"><label for="modal-field-5">Max Question
                                        Allowed to Answer</label><input class="mb-0" id="modal-field-5" type="number" value="10"><small><i class="feather-info"></i> This amount of question
                                        will be available for students to answer, and question will
                                        comes randomly from all available questions
                                        belongs with a quiz, if this amount is greater than
                                        available question, then all questions will be
                                        available for a student to answer.</small></div>
                            </div>
                            <div class="course-field rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion mt--30">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accThree3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree3" aria-expanded="false" aria-controls="accCollapseThree3"><i class="feather-settings me-3"></i>Advance
                                            Settings</button>
                                    </h2>
                                    <div id="accCollapseThree3" class="accordion-collapse collapse" aria-labelledby="accThree3">
                                        <div class="accordion-body card-body">
                                            <div class="form-check form-switch mb--5"><input class="form-check-input" type="checkbox" role="switch" id="autoStart"><label class="form-check-label" for="autoStart">Quiz
                                                    Auto
                                                    Start</label></div><small><i class="feather-info"></i> If you enable this
                                                option, the quiz
                                                will start automatically after the page is
                                                loaded.</small>
                                            <div class="course-field d-sm-flex gap-4 mt--20">
                                                <div class="col-sm-6 col-xl-3 mb-4 mb-sm-0"><label class="form-check-label" for="option-1">Question
                                                        Layout</label>
                                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                        <div class="dropdown bootstrap-select w-100 rbt-select-dark"><select class="w-100 rbt-select-dark">
                                                            <option value="Random" selected="selected">Random</option>
                                                            <option value="sorting">Sorting
                                                            </option>
                                                            <option value="asc">Ascending </option>
                                                            <option value="desc">Descending
                                                            </option>
                                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-8" aria-haspopup="listbox" aria-expanded="false" title="Random"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Random</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-8" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xl-4"><label class="form-check-label" for="option-1">Questions
                                                        Order</label>
                                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                        <div class="dropdown bootstrap-select w-100 rbt-select-dark"><select class="w-100 rbt-select-dark">
                                                            <option value="Set question layout view" selected="selected">Set
                                                                question layout view</option>
                                                            <option value="single_question">Single
                                                                Question</option>
                                                            <option value="question_pagination">
                                                                Question
                                                                Pagination</option>
                                                            <option value="question_below_each_other">
                                                                Question below each other</option>
                                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-9" aria-haspopup="listbox" aria-expanded="false" title="Set
                                                                question layout view"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Set
                                                                question layout view</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-9" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course-field mt--20">
                                                <div class="form-check form-switch mb--5"><input class="form-check-input" type="checkbox" role="switch" id="hideNumber"><label class="form-check-label" for="hideNumber">Hide
                                                        question number</label></div><small><i class="feather-info"></i>Show/hide question
                                                    number during attempt.</small>
                                            </div>
                                            <div class="course-field d-lg-flex flex-wrap justify-content-between gap-5 mt--20">
                                                <div class="col-lg-7 mb-4 mb-lg-0"><label for="modal-field-sort-answer">Short answer
                                                        characters
                                                        limit</label><input class="mb-0" id="modal-field-sort-answer" type="number" value="200"><small><i class="feather-info pe-1"></i>Student
                                                        will place answer in short
                                                        answer question type within this characters
                                                        limit.</small></div>
                                                <div class="col-lg-7"><label for="modal-field-3">Open-Ended/Essay
                                                        questions answer character
                                                        limit</label><input class="mb-0" id="modal-field-7" type="number" value="500"><small><i class="feather-info pe-1"></i>Students
                                                        will place the answer in the
                                                        Open-Ended/Essay
                                                        question type within this character
                                                        limit.</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div></form>
                
            </div>
        </div>
    </div>
</div>
<div class="pt--30 justify-content-between">
        <button type="button" class="rbt-btn btn-border btn-md radius-round-10 mr--10" id="prev-btn" disabled="disabled">Back</button>
        <button type="button" class="rbt-btn btn-md radius-round-10 d-inline-block" id="next-btn-2">Save &amp;
            Next</button>
    </div>
</div>

@endsection