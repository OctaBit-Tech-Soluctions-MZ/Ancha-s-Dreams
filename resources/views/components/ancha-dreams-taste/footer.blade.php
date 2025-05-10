 <!-- START FOOTER -->
 <footer class="bg-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/images/logo.png" alt="" class="logo-dark" height="18">
                <p class="text-muted mt-4">A nossa plataforma facilita o aprendizado culinário com rapidez e praticidade.
                   <br> Poupe horas na busca por receitas e técnicas
                   <br>Aprenda, cozinhe e evolua com conteúdos organizados e acessíveis.</p>

                <ul class="social-list list-inline mt-3">
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>

            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Links</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="{{route('home')}}" class="text-muted" wire:navigate>Inicio</a></li>
                    <li class="mt-2"><a href="{{route('courses')}}" class="text-muted" wire:navigate>Curso</a></li>
                    <li class="mt-2"><a href="{{route('books')}}" class="text-muted" wire:navigate>Livros</a></li>
                    <li class="mt-2"><a href="{{route('shop')}}" class="text-muted" wire:navigate>Mini Shop</a></li>
                    <li class="mt-2"><a href="{{route('about')}}" class="text-muted" wire:navigate>Sobre Nós</a></li>
                    <li class="mt-2"><a href="{{route('contacts')}}" class="text-muted" wire:navigate>Contactos</a></li>
                </ul>

            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Acesso</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="{{route('login')}}" class="text-muted" wire:navigate>Login</a></li>
                    <li class="mt-2"><a href="{{route('register')}}" class="text-muted" wire:navigate>Registo</a></li>
                </ul>
            </div>

            <div class="col-lg-2 mt-3 mt-lg-0">
                <h5 class="text-light">Discover</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Termos de uso</a></li>
                    <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Politicas de Privacidade</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5">
                    <p class="text-muted mt-4 text-center mb-0">© 2025. Design and coded by
                        Octabit</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->