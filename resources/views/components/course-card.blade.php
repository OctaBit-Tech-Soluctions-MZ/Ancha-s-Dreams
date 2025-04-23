@foreach ($courses as $course)

    <!-- Start Single Course  -->
    <div class="col-lg-4 col-md-6 col-12">
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
                        <a class="rbt-round-btn" title="Favorito" href="#"><i class="fas fa-bookmark"></i></a>
                    </div>
                </div>
                <h4 class="rbt-card-title text-start">
                    <a href="{{ route('courses.details', ['slug' => $course->slug]) }}" class=" text-decoration-none">
                        {{ $course->name }}</a>
                </h4>
                <ul class="rbt-meta text-start">
                    <li><i class="fa fa-book me-2"></i>20 Aulas</li>
                    <li><i class="fa fa-user-graduate me-2"></i>30 Alunos</li>
                </ul>
                <x-short-text class="" :text="$course->description" :limit="70"/>
                <div class="rbt-card-bottom">
                    <div class="rbt-price">
                        <span class="current-price fs-6">{{ $course->price }} mzn</span>
                        <span class="off-price">{{ $course->price + $course->price * 0.25 }} mzn</span>
                    </div>
                    <a class="rbt-btn-link text-decoration-none" href="{{ route('courses.details', ['slug' => $course->slug]) }}">Ler Mais<i class="ms-2 fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach
