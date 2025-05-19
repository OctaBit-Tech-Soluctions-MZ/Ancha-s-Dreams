<x-app-layout :headerBg="'bg-dark text-white'">
    <style>
        #mainNav {
            background: #212529;
            color: white;
        }
    </style>
    <div class="container-fluid mt--90 p-4">

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="text-center">

                    <h1 class="text-error mt-4">403</h1>
                    <h4 class="text-uppercase text-danger mt-3">{{ $exception->getMessage() ?: 'Acesso não autorizado' }}</h4>
                    <p class="text-muted mt-3">Ops! Parece que você tentou acessar um conteúdo que não
                        tem permissão para ver.
                        Isso pode acontecer quando:
                        Você tentou acessar um curso que ainda não comprou.
                        Está tentando entrar em uma página restrita ou sem permissão.
                        Dica:
                        Verifique seus cursos adquiridos ou volte para a área principal usando os links acima.</p>
                </div> <!-- end /.text-center-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->
    </div> <!-- container -->
</x-app-layout>