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
                            <li class="rbt-breadcrumb-item"><a href="{{ route('courses') }}" wire:navigate>Cursos</a></li>
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
                                    <span class="image"><img src="{{ asset('assets/img/card-icon-1.png') }}" alt="Best Seller Icon"></span> Bestseller
                                </span>
                            </div>

                            <div class="feature-sin rating">
                                <a href="#">4.8</a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>

                            <div class="feature-sin total-rating">
                                <a class="rbt-badge-4" href="#">215,475 Avaliações</a>
                            </div>

                            <div class="feature-sin total-student">
                                <span>616,029 Alunos</span>
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
                            <img class="w-100" src="{{ asset('storage/courses/'.$course->cover)}}" alt="{{ $course->name }}">
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
                        
                        
                        <!-- Start Course Content  -->
                        <div class="course-content rbt-shadow-box coursecontent-wrapper mt-3" id="coursecontent">
                            <div class="rbt-course-feature-inner">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Conteudos do Curso</h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                    <div class="accordion" id="accordionExampleb2">
                                        @foreach($course->contents as $content)
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header card-header" id="headingTwo1">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#collapseTwo{{ $loop->index + 1 }}" 
                                                    aria-expanded="false" aria-controls="collapseTwo{{ $loop->index + 1}}">
                                                    {{$content->title}} <span class="rbt-badge-5 ms-1">
                                                            {{ $content->duration}}</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo{{ $loop->index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                                    <div class="accordion-body card-body pr--0">
                                                        <ul class="rbt-course-main-content list-unstyled">
                                                            <li>
                                                                <a href="{{ route('lessons',['slug' => $content->slug]) }}" wire:navigate>
                                                                    <div class="course-content-left">
                                                                        <i class="fas fa-play-circle me-2"></i> <span class="text-grey">{{ $content->title}}</span>
                                                                    </div>
                                                                    <div class="course-content-right">
                                                                        <span class="min-lable">{{ $content->duration }}</span>
                                                                        <span class="rbt-badge variation-03 bg-primary-opacity"><i class="fas fa-eye"></i> Preview</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <a class="hover-flip-item-wrapper" href="" @disabled(true)>{{ $course->users->name. ' '. $course->users->surname }}</a>
                                            </h5>
                                            <ul class="rbt-meta mb--20 mt--10">
                                                <li><i class="fas fa-user-graduate me-2"></i>912,970 Alunos</li>
                                                <li><a href="#"><i class="fas fa-video me-2"></i>{{ $course->users->courses_count }} Cursos</a></li>
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

                        <!-- Start Edu Review List  -->
                        <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                            <div class="course-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Avaliações</h4>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-lg-3">
                                        <div class="rating-box">
                                            <div class="rating-number">5.0</div>
                                            <div class="rating">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                            </div>
                                            <span class="sub-title">Avaliação do Curso</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="review-wrapper">
                                            <x-ancha-dreams-taste.single-progress-bar :value="45"/>
                                            <x-ancha-dreams-taste.single-progress-bar :value="25"/>
                                            <x-ancha-dreams-taste.single-progress-bar :value="15"/>
                                            <x-ancha-dreams-taste.single-progress-bar :value="10"/>
                                            <x-ancha-dreams-taste.single-progress-bar :value="5"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Edu Review List  -->

                        <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                            <div class="section-title">
                                <h4 class="rbt-title-style-3">Featured review</h4>
                            </div>
                            <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                <div class="rbt-course-review about-author">
                                    <div class="media">
                                        <div class="thumbnail">
                                            <a href="#">
                                                <img src="{{ asset('assets/img/undraw_profile.svg')}}" alt="Author Images">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                        Farjana Bawnia
                                                    </a>
                                                </h5>
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p class="description">At 29 years old, my favorite compliment is being
                                                    told that I look like my mom. Seeing myself in her image, like this
                                                    daughter up top.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="rbt-show-more-btn">ver mais</div>
                        </div>
                    </div>
                    <div class="related-course mt--60">
                        <div class="row g-5 align-items-end mb--40">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="section-title" id="morecourses">
                                    <span class="subtitle bg-primary-opacity text-primary">Top Curso</span>
                                    <h4 class="title">Mais Cursos de <strong class="color-primary">{{ $course->users->name. ' '. $course->users->surname }}</strong></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="read-more-btn text-start text-md-end">
                                    <a class="rbt-btn rbt-switch-btn btn-border btn-sm" wire:navigate href="{{ route('courses',['author' => $course->users->id])}}" wire:navigate>
                                        <span data-text="Ver todos cursos">Ver todos cursos</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">
                            @foreach ($recommendedCourses as $recommendedCourse)
                                <x-ancha-dreams-taste.courses-card :course="$recommendedCourse" :expand="6"/>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">

                            <div class="content-item-content">
                                <div class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="rbt-price">
                                        <span class="current-price fs-7">{{ $course->price }} mzn</span>
                                        <span class="off-price fs-7">{{ $course->price + $course->price * 0.25 }} mzn</span>
                                    </div>
                                    <div class="discount-time">
                                        <span class="rbt-badge color-danger bg-color-danger-opacity"><i class="fas fa-clock"></i> 3 days left!</span>
                                    </div>
                                </div>
                                <div class="add-to-card-button mt--15">
                                    <a href="#" class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" wire:click='addToCart("{{$course->slug}}")' wire:loading.attr='disabled'>
                                        <div wire:loading>
                                            <span class="btn-text">Colocando o curso na carinha...</span>
                                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                            
                                        </div>
                                        <span class="btn-text" wire:loading.remove>Adicionar no carrinho</span>
                                    </a>
                                </div>

                                <div class="rbt-widget-details has-show-more mt--15">
                                    <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                        <li><span>Lançado</span><span class="rbt-feature-value rbt-badge-5">@php
                                            echo humanTime($course->created_at);
                                        @endphp</span>
                                        </li>
                                        <li><span>Inscritos</span><span class="rbt-feature-value rbt-badge-5">100</span>
                                        </li>
                                        <li><span>Quizes</span><span class="rbt-feature-value rbt-badge-5">10</span>
                                        </li>
                                        <li><span>Certificado</span><span class="rbt-feature-value rbt-badge-5">Yes</span></li>
                                    </ul>
                                </div>

                                <div class="social-share-wrapper mt--30 text-center">
                                    <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                        <ul class="social-icon social-default transparent-with-border justify-content-center">
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
                                        <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+444 555
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
