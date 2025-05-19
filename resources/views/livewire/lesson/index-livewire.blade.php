<div class="p-2 mt-5">
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'cursos', 'url' => route('courses')],
    ['label' => $lesson->courses->name, 'url' => route('courses.details',['slug' => $lesson->courses->slug])],
    ['label' => $lesson->title, 'url' => null],
    ],
    'pageTitle' => $lesson->title
    ])
    <div class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course__video__player">
                        <iframe id="player" src="{{$lesson->url}}" frameborder="1"></iframe>
                    </div>
                    <div class="p-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            Ver a receita
                        </button>
                    </div>
                    <div class="course__details__episodes">
                        <div class="section-title">
                            <h5>Outras Aulas</h5>
                        </div>
                        @foreach($lessons_other as $lesson_other)
                        <a href="{{ route('lessons', ['slug' => $lesson_other->slug])}}" wire:navigate>{{
                            $lesson_other->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-12 col-lg-12 order-lg-2 order-xxl-1">

        <!-- start news feeds -->
        <div class="card">
            <div class="card-body pb-1">

                <hr class="m-0">

                <div class="my-1">
                    <span class="btn btn-sm btn-link text-muted"><i class='uil uil-comments-alt'></i>
                        {{$lesson->comments->count()}} Comentarios</span>
                </div>

                <hr class="m-0">

                <div class="mt-3" wire:poll.30s>
                    @foreach($lesson->comments as $comment)
                    <div class="d-flex mb-2 col-md-12">
                        <img class="me-2 rounded" src="{{ asset('/assets/img/undraw_profile_1.svg')}}"
                            alt="Generic placeholder image" height="32">
                        <div>
                            <h5 class="m-0">{{ $comment->users->name }}</h5>
                            <p class="text-muted mb-0"><small>{{humanTime($comment->created_at)}}</small></p>

                            <p class="my-1">{{$comment->comment_text}}</p>

                            <div>
                                <button type="button" class="btn btn-sm btn-link text-muted p-0">
                                    <i class='uil uil-heart me-1'></i> Gostar
                                </button>
                                <button type="button" wire:click='setReply({{$comment->id}})'
                                    class="btn btn-sm btn-link text-muted p-0 ps-2">
                                    <i class='uil uil-comments-alt me-1'></i> Responder
                                </button>
                            </div>
                            @foreach($comment->replies as $reply)
                            <div class="d-flex mt-3 col-md-12">
                                <img class="me-2 rounded" src="{{ asset('/assets/img/undraw_profile_1.svg')}}"
                                    alt="Generic placeholder image" height="32">
                                <div>
                                    <h5 class="m-0">{{$reply->users->name}}</h5>
                                    <p class="text-muted mb-0"><small>{{humanTime($reply->created_at)}}</small></p>

                                    <p class="my-1">{{$reply->comment_text}}</p>
                                </div>
                            </div> <!-- end d-flex-->
                            @endforeach
                            @if($replyCommentId == $comment->id)
                            <x-ancha-dreams-taste.form-comment :action="'sendReply'" :input="'reply'"
                                :attachment='$attachment' />
                            @endif
                        </div> <!-- end div -->
                    </div> <!-- end d-flex-->
                    @endforeach

                    <hr>

                    <x-ancha-dreams-taste.form-comment :action="'sendComment'" :attachment='$attachment' />

                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Receita</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {!! $lesson->recipe !!}
        </div>
    </div>
</div>