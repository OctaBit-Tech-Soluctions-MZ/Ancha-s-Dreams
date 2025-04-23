@foreach ($courses as $course)

<!-- Start Single Course  -->
    <div class="col-lg-6 col-md-6 col-12">
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
                <ul class="rbt-meta text-start row">
                    <li><i class="fa fa-book me-2"></i>20 Aulas</li>
                    <li><i class="fa fa-user-graduate me-2"></i>30 Alunos</li>
                </ul>
                <div class="rbt-card-bottom">
                    <div class="rbt-price">
                        <span class="current-price fs-6">{{ $course->price }} mzn</span>
                        <span class="off-price">{{ $course->price + $course->price * 0.25 }} mzn</span>
                    </div>
                </div>
                <div class="text-end row g-2">
                    <div>
                        <a class="rbt-btn-link text-decoration-none" href="{{ route('instructor.courses.edit', ['slug' => $course->slug]) }}">
                        Editar<i class="ms-2 fa fa-edit"></i></a>
                    </div>
                    <div>
                        <a class="rbt-btn-link text-decoration-none" 
                        data-bs-toggle="modal" 
                        data-bs-target="#deleteModal" 
                        data-action="{{ route('courses.delete', ['slug' => $course->slug]) }}"
                        href="#">
                        Excluir<i class="ms-2 fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
