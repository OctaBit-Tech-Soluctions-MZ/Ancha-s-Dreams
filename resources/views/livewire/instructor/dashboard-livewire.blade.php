<div class="p-2">
    <div class="row">
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-award text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $courses->count() }}</span></h3>
            <p class="text-muted font-15 mb-0">Meus Cursos</p>
        </x-ancha-dreams-taste.card-dashboard>
        
        <x-ancha-dreams-taste.card-dashboard>
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
        
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-food text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $recipes }}</span></h3>
            <p class="text-muted font-15 mb-0">Minhas Receitas</p>            
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-users-alt text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ 30 }}</span></h3>
            <p class="text-muted font-15 mb-0">Meus Alunos</p>  
        </x-ancha-dreams-taste.card-dashboard>
    </div>
    <div class="rbt-dashboard-content bg-color-white mb--60">
        <div>
            <div class="row gy-5">
                <div class="col-lg-12">
                    <x-ancha-dreams-taste.modern-table :title="'Meus Cursos'">
                        <x-slot:header>
                            <tr>
                                <th></th>
                                <th>Nome do Curso</th>
                                <th>Inscritos</th>
                                <th>Avaliações</th>
                            </tr>
                        </x-slot:header>
                            @foreach ($courses_list as $course)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ 5 }}</td>
                                    <td>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                            <i class="off fas fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </x-ancha-dreams-taste-modern-table>
                </div>
            </div>
        </div>
    </div>
</div>