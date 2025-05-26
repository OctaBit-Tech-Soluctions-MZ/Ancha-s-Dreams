<div class="mt--120 mb-3 d-flex justify-content-center align-items-center">
    <div class="card shadow border border-0 col-md-6 p-4 overflow-hidden">
        <div class="card-body">
            <div class="toll-free-box text-center">
                <i class="mdi mdi-alpha-e-box"></i>

                <div class="student-info">
                    <strong>Nome:</strong> {{ $attempt->users->name }} {{ $attempt->users->surname }}<br>
                    <strong>Curso:</strong> {{$attempt->exams->courses->name}}
                </div>

                <div class="score">
                    <strong>Nota:</strong> {{$attempt->score}} / 20
                </div>
                @if ($attempt->score >= $attempt->exams->passing)
                <div class="bg-success text-white p-3 rounded mt-2 mb-2">
                    Parabéns! Você passou! <a href="" class="ms-2 text-white text-decoration-underline" wire:navigate>Imprimir Certificado</a>
                </div>
                @else

                <div class="bg-danger text-white p-3 rounded mt-2 mb-2">
                    Lamentamos, você não passou. <a href="{{route('exams.make', ['id' => $attempt->exams->id])}}" class="ms-2 text-white text-decoration-underline" wire:navigate>Tente
                        Novamente</a>
                </div>

                @endif

                <div class="__footer__">
                    Resultado gerado {{humanTime($attempt->created_at)}}
                </div>
            </div>
        </div>
    </div>
</div>