<div class="p-2">
    <x-ancha-dreams-taste.masthead :subHeading="'Sabores que Conectam!'"
        :heading="'Sabores com paixão para momentos inesquecíveis.'" />
    <div class="container p-3">
        <div class="row">
            <!-- Lista de Produtos -->
            <div class="row">
                <h2 class="mb-2 text-center"><i class="mdi mdi-basket"></i> Culinária de qualidade, entregue à sua
                    porta.</h2>
                <div class="mb-3 col-md-12">
                    <div class="mb-4">
                        <div class="rbt-course-top-wrapper mt--40 mb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div
                                            class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-center">
                                            <div class="rbt-short-item">
                                                <div class="rbt-search-style me-0">
                                                    <input type="text" placeholder="pesquise o seu produto aqui..."
                                                        wire:model.live="search">
                                                    <button type="button" class="rbt-search-btn rbt-round-btn">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'" />
                    @elseif(session('warning'))
                    <x-ancha-dreams-taste.alert :type="'warning'" />
                    @endif
                    <div class="row ms-3 mb-4">
                        @if(count($products) == 0)
                        <div class="text-center fs-3">Nenhum produto foi registado</div>
                        @else
                        @foreach ($products as $product)
                        <x-ancha-dreams-taste.product-card :productmodel="$product" />
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>