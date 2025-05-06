<div class='mt--15'>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Livros', 'url' => route('books.list')],
    ['label' => 'Novo Livro', 'url' => null],
    ],
    'pageTitle' => 'Novo Livro'
    ])
    <div class="row">
        <form class="rbt-course-field-wrapper rbt-default-form" method="POST" wire:submit.prevent='create'>
            @csrf
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" id="title" placeholder="digite o titulo do livro" wire:model='title'>
                    @error('title')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <label for="author" class="form-label">Autor</label>
                    <input type="text" id="author" placeholder="digite o autor do livro" wire:model='author'>
                    @error('author')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-12">
                    <label for="price" class="form-label">Preço</label>
                    <input type="text" id="price" placeholder="digite o preço do livro" wire:model='price'>
                    <small><i class="feather-info"></i>Em caso de livros fisico o preço é por unidade</small>
                    @error('price')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="description">Breve Descrição do Livro</label>
                    <textarea id="description" cols="30" rows="10" wire:model='description'></textarea>
                    <small><i class="feather-info"></i> Descreve em poucas palavras sobre o conteudo do livro, isso vai ajudar a despertar o interece ao cliente</small>
                    @error('description')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <h6>Capa do Livro</h6>
                    <div class="rbt-create-course-thumbnail upload-area">
                        <div class="upload-area">
                            <div class="brows-file-wrapper" data-black-overlay="9">
                                <!-- actual upload which is hidden -->
                                <input wire:model="cover" id="createinputfile" type="file"
                                    class="inputfile">
                                <img id="createfileImage"
                                    src="{{ $cover? $cover->temporaryUrl() : asset('assets/img/thumbnail-placeholder.svg') }}"
                                    alt="file image">
                                <!-- our custom upload button -->
                                <label class="d-flex" for="createinputfile"
                                    title="Ficheiro nenhum escolhido">
                                    <i class="fas fa-upload"></i>
                                    <span class="text-center">Escolha a Capa do Livro</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <small><i class="feather-info"></i> <b>Tamanho Maximo:</b> 2MB,
                        <b>Arquivos suportados:</b> JPG, JPEG, PNG, WEBP, GIF
                        <b>Atenção:</b> Espere uns 15 segundos depois de carregar a imagem</small>
                    @error('cover')
                    <span class="color-danger p-2"><i class="feather-alert-cicle"></i>{{ $message
                        }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-3">
                    <label for="is_digital">O Livro é Fisico?</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_digital" wire:click='isDigital' checked>
                    </div>
                </div>
                @if(!$is_digital)
                    <div class="course-field mb-3 col-md-9">
                        <label for="qtd">Quantidade dos Livros</label>
                        <input type="number" id="qtd" wire:model='qtd' placeholder="Informe a quantidade em stock dos livros">
                    </div>
                @else
                    <div class="course-field mb-3 col-md-9">
                        <label for="book">Carregue aqui o Livro digital (E-book)</label>
                        <input type="file" class="form-control" id="book" wire:model='book'>
                    </div>
                @endif
            </div>
            @if (session('success'))
                <x-ancha-dreams-taste.alert :type="'success'"/>
            @endif
            <x-ancha-dreams-taste.button-loading :title="'Registar Livro'" />
        </form>
    </div>
</div>