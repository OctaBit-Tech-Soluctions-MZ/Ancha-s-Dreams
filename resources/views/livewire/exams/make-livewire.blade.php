<div class="mt--100 p-3">
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">{{$exam->title}}</h4>
                                        <p class="font-13 text-white-50"> Titulo do Exame</p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1">{{$exam->time_limit}}</h5>
                                                <p class="mb-0 font-13 text-white-50">Duração do Exame
                                                </p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1">{{$exam->passing}}/20</h5>
                                                <p class="mb-0 font-13 text-white-50">Nota
                                                    necessario para passar
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div>
            <!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <div class="row">
        @if(empty($exam->questions))
        <span class="text-center mt-3 fs-3">Nenhum Questão foi criado</span>
        @else
        <form method="post" wire:submit.prevent='save'>
            <div class="accordion custom-accordion" id="custom-accordion-one" wire:ignore>
                @foreach($exam->questions as $question)
                <div class="card mb-0">
                    <div class="card-header" id="heading{{$loop->index + 1}}">
                        <h5 class="m-0">
                            <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse"
                                href="#collapse{{$loop->index + 1}}" aria-expanded="false"
                                aria-controls="collapse{{$loop->index + 1}}">
                                {{$question->question_text}}? <i class="mdi mdi-chevron-down accordion-arrow"></i>
                            </a>
                        </h5>
                    </div>

                    <div id="collapse{{$loop->index + 1}}" class="collapse"
                        aria-labelledby="heading{{$loop->index + 1}}" data-bs-parent="#custom-accordion-one">
                        <div class="card-body">
                            <h5>Opções</h5>
                            <ol class="list-group list-group-numbered">
                                @foreach($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $answer->answer_text }}</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="radio" id="customRadio{{$cont.''.$loop->index + 1 }}"
                                                class="form-check-input" name="options.{{$cont}}" wire:click='setOption({{$answer->id}}, {{$cont}})'>
                                            <label class="form-check-label d-inline-block"
                                                for="customRadio{{$cont.''.$loop->index + 1 }}">Escolha a
                                                Opção
                                                correcta</label>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @php $cont = $cont + 1; @endphp
                            </ol>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if (session('success'))
                <x-ancha-dreams-taste.alert :type="'success'"/>
            @endif
            <div class="course-field mt-2 mb--15 d-flex justify-content-end">
                <x-ancha-dreams-taste.button-loading :title="'Submeter'" />
            </div>
        </form>
        @endif
    </div>
</div>