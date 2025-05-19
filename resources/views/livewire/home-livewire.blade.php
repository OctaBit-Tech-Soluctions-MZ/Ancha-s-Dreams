<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Bem vindo a nossa Plataforma!'" :heading="'PRAZER EM CONHECER TE'" />
    <section class="container my-5">
        <div class="row align-items-center">
            <!-- Imagem ao lado (Reduzida) -->
            <div class="col-md-6 text-center img p-2">
                <img src="{{ asset('assets/img/culinary_classes_online.png') }}" alt="Culinária" class="img-fluid"
                    style="max-width: 80%; height: auto;">
            </div>
            <!-- Texto Sobre Nós -->
            <div class="col-md-6 p-3" id="nos">
                <h2 class="fw-bold">Domine a arte da culinária no conforto do seu lar!</h2>
                <p class="text-muted text-p">
                    Somos apaixonados por gastronomia e acreditamos que qualquer pessoa pode cozinhar pratos incríveis.
                    Nossa plataforma ensina receitas detalhadas, técnicas culinárias e segredos de chefs renomados.
                </p>
                <p class="text-muted text-p">
                    Junte-se a nós e transforme sua cozinha em um verdadeiro laboratório de sabores!
                </p>
            </div>
        </div>
    </section>


    <section class="container my-5 bg-primary p-3">
        <div class="row align-items-center">
            <!-- Texto Sobre Nós -->
            <div class="col-md-6 p-4">
                <h1 class="fw-bold text-white">Dê vida às suas receitas! Aprenda, pratique e compartilhe sua paixão pela
                    culinária.</h1>
            </div>
            <!-- Imagem ao lado (Reduzida) -->
            <div class="col-md-6 text-center img p-2">
                <img src="{{ asset('assets/img/make_cake.png') }}" alt="Culinária" class="img-fluid"
                    style="max-width: 80%; height: auto;">
            </div>
        </div>
    </section>

    <!-- Services-->
    <section class="container">
        <div>
            <div class="row text-center">
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 rounded shadow img">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-utensils fa-stack-1x fa-inverse" style="margin-left: 100px"></i>
                        </span>
                        <h4 class="mt--100">Receitas Exclusivas</h4>
                        <p class="text-muted text-p">Compartilhe e descubra receitas incríveis com a nossa comunidade!</p>
                    </div>
                </div>
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 rounded shadow">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-mobile-alt fa-stack-1x fa-inverse" style="margin-left: 100px"></i>
                        </span>
                        <h4 class="mt--100">Responsivo</h4>
                        <p class="text-muted text-p">Estude onde e quando quiser no seu dispositivo preferido.</p>
                    </div>
                </div>
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 rounded shadow img">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-seedling fa-stack-1x fa-inverse" style="margin-left: 100px"></i>
                        </span>
                        <h4 class="mt--100">Culinária Saudável</h4>
                        <p class="text-muted text-p">Aprenda a preparar receitas saudáveis e nutritivas.</p>
                    </div>
                </div>
            </div>

    </section>

    <div class="rev-section">

        <h2 class="title">Experiências de quem já aprendeu!</h2>
        <p class="note text-primary">Confira as experiências e histórias de quem transformou sua paixão pela culinária
            com a nossa plataforma!</p>

        <div class="reviews">
            @foreach($testimonials as $testimonial)
            <div class="review col-sm-3 img">
                <div class="body-review">
                    <div class="name-review">{{ $testimonial->users->name }}</div>
                    <div class="role-review text-primary text-capitalize">
                        @foreach($testimonial->users->roles as $role)
                        {{$role->name}}
                        @endforeach
                    </div>
                    @livewire('star-rating', ['rate' => $testimonial->rate])
                    <div class="desc-review">{{ $testimonial->comment }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Contact-->
<div class="row mt-2 py-5 align-items-center p-2">
    <div class="col-lg-5">
        <img src="{{ asset('assets/img/online-courses-concept.png')}}" class="img-fluid img" alt="online-courses-concept">
    </div>
    <div class="col-lg-6 offset-lg-1">
        <h3 class="fw-normal">Comece Sua Jornada Culinária Agora</h3>
        <p class="text-muted mt-3 text-p">Descubra o prazer de cozinhar com os melhores chefs e receitas do conforto da sua
            casa. Inscreva-se, escolha o seu curso e aprenda passo a passo no seu ritmo e no seu tempo.</p>

        <div class="mt-4">
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Cursos de culinária para todos
                os níveis</p>
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Compra de livros e materiais
                exclusivos</p>
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Interação com a comunidade em
                grupos temáticos</p>
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Partilha de receitas, dicas e
                experiências</p>
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Suporte técnico dedicado e
                rápido</p>
            <p class="text-muted text-p"><i class="mdi mdi-circle-medium text-primary"></i> Mini loja com produtos
                selecionados</p>
        </div>
        <a href="{{route('register')}}" class="btn btn-primary btn-rounded mt-3" wire:navigate>Vamos cozinhar
            juntos<i class="mdi mdi-arrow-right ms-1"></i></a>

    </div>
</div>
</div>