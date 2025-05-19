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
                    <img src="{{asset('admin/images/file-searching.svg')}}" height="90" alt="File not found Image">

                    <h1 class="text-error mt-4">404</h1>
                    <h4 class="text-uppercase text-danger mt-3">{{ $exception->getMessage() ?: 'Pagina Não Encontrada' }}</h4>
                    <p class="text-muted mt-3">Parece que você pegou o caminho errado.
                        Não se preocupe, isso acontece com os melhores!
                        Aqui vai uma dica:
                        Use os links no topo da página para navegar e voltar aos trilhos..</p>
                </div> <!-- end /.text-center-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->
    </div> <!-- container -->
</x-app-layout>