<div class="mt--20" wire:init='loadCourses'>
    @if ($courses == null)
    <div class="p-3">
        <div class="color-primary d-flex w-100 justify-content-center align-items-center">
            <div class="spinner-border me-3" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            Carregando os cursos...
        </div>
    </div>
    @else
    <div>
        {{-- Alert Blade Component --}}
        @if (session('success'))
        <x-ancha-dreams-taste :type='success' />
        @endif
        <div class="rbt-tutor-information-right">
            <div class="d-flex justify-content-start ps-3">
                <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" href="{{ route('courses.register') }}"
                    wire:navigate>
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text ms-2 me-2">Adicionar novo curso</span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                        <span class="btn-icon"><i class="feather-plus-square"></i></span>
                    </span>
                </a>
            </div>
        </div>
        <div class="p-2">
            @if (count($courses) == 0 && $search)
            <div class="p-3 text-center">
                nao foi possivel encontrar um curso com {{ $search }} <a href="{{ route('courses.instructor') }}">Ver
                    todos Cursos</a>
            </div>
            @elseif (count($courses) == 0)
            <div class="p-3">
                <div class="color-primary d-flex w-100 justify-content-center align-items-center">
                    <div class="spinner-border me-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    Carregando os cursos...
                </div>
            </div>
            @else
            <div class="panel-body bio-graph-info">
                <div>
                    <div class="d-flex">
                        <div class="row g-2">
                            {{-- Course Card Blade Component. resources/components/course-card-instructor.blade.php --}}
                            @foreach($courses as $course)
                            <x-ancha-dreams-taste.courses-card :course="$course" :isInstructorPainel="true" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $courses->onEachSide(3)->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>