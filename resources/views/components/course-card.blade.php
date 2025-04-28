    <!-- Start Single Course  -->
    <div class="col-lg-{{ $expandWidth }} col-md-6 col-12">
        <div class="rbt-card variation-01 rbt-hover">
            <div class="rbt-card-img">
                <a href="{{ route('courses.details', ['slug' => $course->slug]) }}">
                    <img src="{{ asset('assets/img/courses/'.$course->course_photo_path)}}" alt="Card image">
                </a>
            </div>
            <div class="rbt-card-body">
                <div class="rbt-card-top">
                    <div class="rbt-review">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-count"> (3 Avaliações)</span>
                    </div>
                    <div class="rbt-bookmark-btn">
                        <a class="rbt-round-btn" title="Favorito" href="#"><i class="feather-bookmark"></i></a>
                    </div>
                </div>
                <h4 class="rbt-card-title text-start">
                    <a href="{{ route('courses.details', ['slug' => $course->slug]) }}" class=" text-decoration-none">
                        {{ $course->name }}</a>
                </h4>
                <ul class="rbt-meta text-start">
                    <li><i class="feather-book me-2"></i>{{ $course->contents->count() }} Aulas</li>
                    <li><i class="feather-users me-2"></i>30 Alunos</li>
                </ul>
                    {{-- Verifica se o card vai ser exibido no painel do instrutor ou 
                    na secção de curso --}}
                    
                @if (!$isInstructorPainel)

                    <x-short-text :text="$course->description" :limit="60"/>
                    <div class="rbt-card-bottom">
                        <div class="rbt-price">
                            <span class="current-price fs-6">{{ $course->price }} mzn</span>
                            <span class="off-price">{{ $course->price + $course->price * 0.25 }} mzn</span>
                        </div>
                        <a class="rbt-btn-link text-decoration-none" href="{{ route('courses.details', ['slug' => $course->slug]) }}">Ler Mais<i class="ms-2 feather-arrow-right"></i></a>
                    </div>

                @else

                    <div class="rbt-card-bottom">
                        <div class="rbt-price">
                            <span class="current-price fs-6">{{ $course->price }} mzn</span>
                            <span class="off-price">{{ $course->price + $course->price * 0.25 }} mzn</span>
                        </div>
                    </div>
                    <div class="text-start d-flex gap-3 p-3">
                        <div>
                            <a class="rbt-btn-link text-decoration-none" href="{{ route('instructor.courses.edit', ['slug' => $course->slug]) }}">
                            <i class="me-2 feather-edit"></i>Editar</a>
                        </div>
                        <div>
                            <a class="rbt-btn-link text-decoration-none" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            data-action="{{ route('courses.delete', ['slug' => $course->slug]) }}"
                            href="#">
                            <i class="me-2 feather-trash"></i>Excluir</a>
                        </div>
                        <div><a href="{{ route('instructor.lessons', ['slug' => $course->slug]) }}" 
                            class="rbt-btn-link text-decoration-none"><i class="me-2 feather-video"></i>Aulas</a></div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    