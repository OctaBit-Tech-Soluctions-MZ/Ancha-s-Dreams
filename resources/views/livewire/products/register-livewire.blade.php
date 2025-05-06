<div class='mt--15'>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Produtos', 'url' => route('products.list')],
    ['label' => 'Novo Produto', 'url' => null],
    ],
    'pageTitle' => 'Novo Produto'
    ])
    <div class="row">
        <form class="rbt-course-field-wrapper rbt-default-form" method="POST" wire:submit.prevent='create'>
            @csrf
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="name" class="form-label">Nome do Produto</label>
                    <input type="text" id="name" placeholder="digite o Nome do Produto" wire:model='name'>
                    @error('name')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <label for="qtd" class="form-label">Quantidade Disponivel</label>
                    <input type="number" id="qtd" placeholder="digite a quantidade do Produto" wire:model='qtd'>
                    @error('qtd')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-12">
                    <label for="price" class="form-label">Preço</label>
                    <input type="number" id="price" placeholder="digite o preço do Produto" wire:model='price'>
                    <small><i class="feather-info"></i>Preço é por unidade</small>
                    @error('price')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="course-field mb-3 col-md-6">
                    <label for="description">Breve Descrição do Produto</label>
                    <textarea id="description" cols="30" rows="10" wire:model='description'></textarea>
                    <small><i class="feather-info"></i> Descreve em poucas palavras sobre o conteudo do Produto, isso vai ajudar a despertar o interece ao cliente</small>
                    @error('description')
                        <span class="color-danger mt--20"><i class="feather-alert-cicle"></i> {{ $message }}</span>
                    @enderror
                </div>
                <div class="course-field mb-3 col-md-6">
                    <h6>Capa do Produto</h6>
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
                                    <span class="text-center">Escolha a Capa do Produto</span>
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
            
            @if (session('success'))
                <x-ancha-dreams-taste.alert :type="'success'"/>
            @endif
            <x-ancha-dreams-taste.button-loading :title="'Registar Produto'" />
        </form>
    </div>
</div>