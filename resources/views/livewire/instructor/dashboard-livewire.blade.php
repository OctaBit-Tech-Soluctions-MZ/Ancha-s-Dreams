<div class="p-2">
    <div class="row">
        <x-ancha-dreams-taste.card-dashboard :colvalue='4'>
            <i class="uil-award text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $courses->count() }}</span></h3>
            <p class="text-muted font-15 mb-0">Meus Cursos</p>
        </x-ancha-dreams-taste.card-dashboard>
        
        <x-ancha-dreams-taste.card-dashboard :colvalue='4'>
            <i class="uil-video text-muted" style="font-size: 24px;"></i>
            <h3><span>@php
                            $content = 0;
                            foreach ($courses as $course) {
                                $content = $content + $course->contents->count();
                            }
                            echo $content;
                        @endphp   </span></h3>
            <p class="text-muted font-15 mb-0">Minhas Aulas</p>            
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard :colvalue='4'>
            <i class="uil-users-alt text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $uniqueStudentCount }}</span></h3>
            <p class="text-muted font-15 mb-0">Meus Alunos</p>  
        </x-ancha-dreams-taste.card-dashboard>
    </div>
</div>