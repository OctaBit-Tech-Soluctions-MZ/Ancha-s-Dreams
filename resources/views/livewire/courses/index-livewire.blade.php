<div>

    {{-- Masthead (opcional) --}}
    
    <x-ancha-dreams-taste.masthead 
        :subHeading="'Os nossos cursos de culinária'" 
        :heading="'São 100% digitais e com um método inovador.'" 
    />
   

    <!-- Seção de Cursos -->
    <section class="p-1">
        <div class="container mt-4">

            <!-- Título Central -->
            <div class="text-center mb-4">
                <h5 class="mt-4">
                    <strong>CONHEÇA OS CURSOS E VEJA O QUE VOCÊ VAI APRENDER</strong>
                </h5>
            </div>

            <!-- Filtro (busca, categorias, etc) -->
            <div class="mb-4">
                <x-ancha-dreams-taste.filter 
                    :route="route('courses')" 
                    :placeholder="'o seu curso'" 
                    :person="'Instrutor'" 
                />
            </div>

            <!-- Resultado dos Cursos -->
            @if (empty($courses) || $courses->isEmpty())
                <div class="alert alert-danger text-center">
                    Nenhum Curso foi registado
                </div>
            @else
                <!-- Cards dos Cursos -->
                <div class="row g-3">
                    @foreach($courses as $course)
                        <x-ancha-dreams-taste.courses-card :course="$course" :expand="3"/>
                    @endforeach
                </div>

                <!-- Paginação -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $courses->onEachSide(3)->links() }}
                </div>
            @endif

        </div>
    </section>
</div>