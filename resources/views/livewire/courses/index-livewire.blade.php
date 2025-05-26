<div>

    {{-- Masthead (opcional) --}}

    <x-ancha-dreams-taste.masthead :subHeading="'Os nossos cursos de culinária'"
        :heading="'São 100% digitais e com um método inovador.'" />


    <!-- Seção de Cursos -->
    <section class="p-1">
        <div class="container mt-4">

            <!-- Título Central -->
            <div class="text-center mb-4">
                <h4 class="mt-4">
                    <strong>CONHEÇA OS CURSOS E VEJA O QUE VOCÊ VAI APRENDER</strong>
                </h4>
            </div>

            <!-- pesquisa -->
            <div class="mb-4">
                <div class="rbt-course-top-wrapper mt--40 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div
                                    class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-center">
                                    <div class="rbt-short-item">
                                        <div class="rbt-search-style me-0">
                                            <input type="text" placeholder="pesquise o seu curso aqui..."
                                                wire:model.live="search">
                                            <button type="button" class="rbt-search-btn rbt-round-btn">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resultado dos Cursos -->
                @if (empty($courses) || $courses->isEmpty())
                <div class="alert alert-danger text-center">
                    Nenhum Curso foi registado
                </div>
                @else
                <!-- Cards dos Cursos -->
                <div class="row g-3" wire:poll.20s>
                    @foreach($courses as $course)
                    <x-ancha-dreams-taste.courses-card :course="$course" :expand="3" />
                    @endforeach
                </div>

                <!-- Paginação -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $courses->onEachSide(3)->links() }}
                </div>
                @endif

            </div>
            @auth
            <div class="text-start mb-4 border-bottom border-4 border-primary shadow mt-4 " style="width: 190px">
                <h4>
                    <strong>Meus Cursos</strong>
                </h4>
            </div>
            <div class="mb-4">
                @if (empty($myCourses) || $myCourses->isEmpty())
                <div class="alert alert-primary text-center">
                    Nenhum Curso foi adequirido
                </div>
                @else
                <!-- Cards dos Cursos -->
                <div class="row g-3" wire:poll.20s>
                    @foreach($myCourses as $myCourse)
                    <x-ancha-dreams-taste.courses-card :course="$myCourse->courses" :expand="3" />
                    @endforeach
                </div>

                <!-- Paginação -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $myCourses->onEachSide(3)->links() }}
                </div>
                @endif
            </div>
            @endauth
    </section>
</div>