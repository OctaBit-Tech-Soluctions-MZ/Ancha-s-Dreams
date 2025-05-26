<div>
    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3 mt-5">
        <div class="breadcrumb-inner breadcrumb-dark">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Inicio</a></li>
                            <li>
                                <div class="icon-right"><i class="fas fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item"><a href="{{ route('courses') }}" wire:navigate>Cursos</a>
                            </li>
                            <li>
                                <div class="icon-right"><i class="fas fa-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">{{ $course->name }}</li>
                        </ul>
                        <h2 class="title">{{ $course->name }}</h2>
                        <p class="description">{!! $course->description !!}</p>

                        <div class="d-flex align-items-center mb-2 flex-wrap rbt-course-details-feature">

                            <div class="feature-sin best-seller-badge">
                                <span class="rbt-badge-2">
                                    <span class="image"><img src="{{ asset('assets/img/card-icon-1.png') }}"
                                            alt="Best Seller Icon"></span> Bestseller
                                </span>
                            </div>

                            <div class="rbt-review">
                                <span class="me-2">{{$rate_details}}</span>
                                @livewire('star-rating', ['rate' => $rate_details, 'font_size' => 12])
                            </div>
                            <div class="feature-sin total-rating">
                                <a class="rbt-badge-4" href="#">{{$course->testimonials->count()}} Avaliações</a>
                            </div>

                            <div class="feature-sin total-student">
                                <span>{{$course->myCourses->count()}} Aluno/s</span>
                            </div>

                        </div>

                        <div class="rbt-author-meta mb-2">
                            <div class="rbt-avater">
                                <a href="#">
                                    <img src="{{ asset('assets/img/undraw_profile.svg')}}" alt="Sophia Jaymes">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                Por <span>{{ $course->users->name }} {{ $course->users->surname }}</span>
                            </div>
                        </div>

                        <ul class="rbt-meta p-3">
                            <li><i class="fas fa-calendar me-2"></i>Actualizado @php
                                echo humanTime($course->updated_at);
                                @endphp</li>
                            <li><i class="fas fa-award me-2"></i>Curso com Certificado</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Course Details Start -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">
                        <div class="rbt-course-feature-box rbt-shadow-box thuumbnail">
                            <img class="w-100" src="{{ asset('storage/courses/'.$course->cover)}}"
                                alt="{{ $course->name }}">
                        </div>

                        <div id="stickyNav" class="rbt-inner-onepage-navigation bg-white p-2 shadow d-none">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#coursecontent">Aulas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#intructor">Sobre o Instrutor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#review">Avaliações</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#morecourses">Mais Cursos</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        @auth
                        <!-- Start Course Content  -->
                        <div class="course-content rbt-shadow-box coursecontent-wrapper mt-3" id="coursecontent">
                            <div class="rbt-course-feature-inner">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Video Aulas do Curso</h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02">
                                    @foreach($course->contents as $content)
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="d-flex gap-2 ps-2 pe-2">
                                                <div class="course-content-left">
                                                    <i class="fas fa-play-circle me-2"></i> <span class="text-grey">{{
                                                        $content->title}}</span>
                                                </div>
                                                <div class="course-content-right d-flex justify-content-between w-100">
                                                    <span class="min-lable">Duração: {{ timeFormat($content->duration)
                                                        }}</span>
                                                    @if(isset($unlockedLessons[$content->id]) &&
                                                    !$unlockedLessons[$content->id])
                                                    <span class="ms-2 text-danger"><i class="fa fa-lock"></i></span>
                                                    @else
                                                    <a href="{{ route('lessons',['slug' => $content->slug]) }}"
                                                        wire:navigate
                                                        class="rbt-badge variation-03 bg-primary-opacity"><i
                                                            class="fas fa-eye"></i> Assistir Aula</a>
                                                    @endif
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(!empty($course->exams))
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="d-flex gap-2 p-1">
                                                <div class="course-content-left">
                                                    <i class="fas fa-certificate me-2" style="font-size: 18px"></i>
                                                    <span class="text-grey">
                                                        Exame de Certificação
                                                    </span>
                                                </div>
                                                <div class="course-content-right d-flex justify-content-between w-100">
                                                    <span class="min-lable">Duração: {{ $course->exams->time_limit
                                                        }}</span>
                                                    <a href="{{route('exams.make', ['id' => $course->exams->id])}}"
                                                        wire:navigate
                                                        class="rbt-badge variation-03 bg-primary-opacity"><i
                                                            class="fas fa-edit"></i> Fazer Exame Final</a>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endauth
                        <!-- End Course Content  -->
                        <!-- Start Intructor Area  -->
                        <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                            <div class="about-author border border-0 pb--0 pt--0">
                                <div class="section-title mb--30">
                                    <h4 class="rbt-title-style-3">Instrutor</h4>
                                </div>
                                <div class="media align-items-center">
                                    <div class="thumbnail">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/undraw_profile.svg')}}" alt="Author Images">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper" href="" @disabled(true)>{{
                                                    $course->users->name. ' '. $course->users->surname }}</a>
                                            </h5>
                                            <ul class="rbt-meta mb--20 mt--10">
                                                <li><i class="fas fa-user-graduate me-2"></i>{{$uniqueStudentCount}}
                                                    Alunos</li>
                                                <li><a href="#"><i class="fas fa-video me-2"></i>{{
                                                        $course->users->courses_count }} Cursos</a></li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <p class="description">{{ $course->users->instructors->biography }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Intructor Area  -->


                        <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                            <div class="section-title">
                                <h4 class="rbt-title-style-3">Experiencias</h4>
                            </div>
                            @if(count($course->testimonials) == 0)
                            <span class="text-center fs-3">Nenhuma experiencia foi partilhada, seja o primeiro a
                                compartilhar a sua experiencia</span>
                            @else
                            <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                <div class="rbt-course-review about-author">
                                    @foreach($course->testimonials as $testimonial)
                                    <div class="media">
                                        <div class="thumbnail">
                                            <a href="#">
                                                <img src="{{ asset('assets/img/undraw_profile.svg')}}"
                                                    alt="{{$testimonial->users->name}}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                        {{$testimonial->users->name}} {{$testimonial->users->surname}}
                                                    </a>
                                                </h5>
                                                @livewire('star-rating', ['rate' => $testimonial->rate])

                                            </div>
                                            <div class="content">
                                                <p class="description">{{ $testimonial->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="rbt-show-more-btn">ver mais</div>
                            @endif
                            @auth
                            <div class="p-5">
                                <h4>Partilhe a sua experiencia para motivar os outros!!</h4>
                                <form method="POST" wire:submit.prevent='sendTestimonial'>
                                    @csrf
                                    <input type="hidden" wire:model='rate' id="rateInput">
                                    <div class="mb-3 mt-3">
                                        <div class="rating-widget mb-4 text-center">
                                            <!-- Rating Stars Box -->
                                            <div class="rating-stars">
                                                <ul id="stars">
                                                    @php
                                                    $stars = [
                                                    1 => 'Poor',
                                                    2 => 'Fair',
                                                    3 => 'Good',
                                                    4 => 'Excellent',
                                                    5 => 'WOW!!!'
                                                    ];
                                                    @endphp

                                                    @foreach ($stars as $value => $title)
                                                    <li class="star" title="{{ $title }}"
                                                        wire:click="setRating({{ $value }})" class="cursor-pointer">
                                                        <i class="fa fa-star fa-fw"
                                                            style="font-size: 25px;color: {{ ($hoverRating >= $value || (!$hoverRating && $rate >= $value)) ? 'gold' : '#ccc' }}"></i>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Escreva o seu testemunho" rows="5"
                                            wire:model='comment'></textarea>
                                    </div>
                                    @if (session('success'))
                                    <x-ancha-dreams-taste.alert :type="'success'" />
                                    @elseif(session('warning'))
                                    <x-ancha-dreams-taste.alert :type="'warning'" />
                                    @endif
                                    <button class="btn btn-success btn-block" type="submit">
                                        <div wire:loading>
                                            <span class="btn-text">Processando...</span>
                                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1"
                                                role="status" aria-hidden="true"></span>

                                        </div>
                                        <span wire:loading.remove>Avaliar</span>
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                    <div class="related-course mt--60">
                        <div class="row g-5 align-items-end mb--40">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="section-title" id="morecourses">
                                    <span class="subtitle bg-primary-opacity text-primary">Top Curso</span>
                                    <h4 class="title">Mais Cursos de <strong class="color-primary">{{
                                            $course->users->name. ' '. $course->users->surname }}</strong></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="read-more-btn text-start text-md-end">
                                    <a class="rbt-btn rbt-switch-btn btn-border btn-sm" wire:navigate
                                        href="{{ route('courses',['author' => $course->users->id])}}" wire:navigate>
                                        <span data-text="Ver todos cursos">Ver todos cursos</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">
                            @foreach ($recommendedCourses as $recommendedCourse)
                            <x-ancha-dreams-taste.courses-card :course="$recommendedCourse" :expand="6" />
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">

                            <div class="content-item-content">
                                <div
                                    class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="rbt-price">
                                        <span class="current-price fs-7">{{ $course->price }} mzn</span>
                                        <span class="off-price fs-7">{{ $course->price + $course->price * 0.25 }}
                                            mzn</span>
                                    </div>
                                    <div class="discount-time">
                                        <span class="rbt-badge color-danger bg-color-danger-opacity"><i
                                                class="fas fa-clock"></i> 3 days left!</span>
                                    </div>
                                </div>
                                <div class="add-to-card-button mt--15">
                                    @if(empty($course->myCourses))
                                    <a href="#" class="rbt-btn btn-gradient icon-hover w-100 d-block text-center"
                                        wire:click='addToCart("{{$course->slug}}")' wire:loading.attr='disabled'>
                                        <div wire:loading>
                                            <span class="btn-text">Colocando o curso na carinha...</span>
                                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1"
                                                role="status" aria-hidden="true"></span>

                                        </div>
                                        <span class="btn-text" wire:loading.remove>Adicionar no carrinho</span>
                                    </a>
                                    @else
                                    @guest
                                    <a href="#" class="rbt-btn btn-gradient icon-hover w-100 d-block text-center"
                                        wire:click='addToCart("{{$course->slug}}")' wire:loading.attr='disabled'>
                                        <div wire:loading>
                                            <span class="btn-text">Colocando o curso na carinha...</span>
                                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1"
                                                role="status" aria-hidden="true"></span>

                                        </div>
                                        <span class="btn-text" wire:loading.remove>Adicionar no carrinho</span>
                                    </a>
                                    @endguest
                                    @auth
                                    <span class="rbt-btn btn-gradient icon-hover w-100 d-block text-center">
                                        <span class="btn-text">Curso Adquirido</span>
                                    </span>
                                    @endauth
                                    @endif
                                </div>
                                <div class="rbt-widget-details has-show-more mt--15">
                                    <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                        <li><span>Lançado</span><span class="rbt-feature-value rbt-badge-5">@php
                                                echo humanTime($course->created_at);
                                                @endphp</span>
                                        </li>
                                        <li><span>Inscritos</span><span
                                                class="rbt-feature-value rbt-badge-5">{{$course->myCourses->count()}}</span>
                                        </li>
                                        <li><span>Certificado</span><span
                                                class="rbt-feature-value rbt-badge-5">Sim</span></li>
                                    </ul>
                                </div>

                                <div class="social-share-wrapper mt--30 text-center">
                                    <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                        <ul
                                            class="social-icon social-default transparent-with-border justify-content-center">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com/">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.linkdin.com/">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mt--20">
                                    <div class="contact-with-us text-center">
                                        <p>Para mais detalhes do curso</p>
                                        <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i
                                                class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+444 555
                                                    666 777</strong></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>