<div class="p-2">
    <x-ancha-dreams-taste.masthead :subHeading="'Sabores que Conectam!'" :heading="'Sabores com paixão para momentos inesquecíveis.'"/>
    <div class="container p-3">
        <div class="row">
            <!-- Lista de Produtos -->
            <div class="row">
                <h2 class="mb-2 text-center"><i class="mdi mdi-basket"></i> Culinária de qualidade, entregue à sua porta.</h2>
                <div class="mb-3 col-md-12">
                    <x-ancha-dreams-taste.filter :route="route('shop')" :placeholder="'Pesquise o seu produto aqui'" :person="'Autor'"/>
                </div>
                @if(session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'"/>
                @elseif(session('warning'))
                    <x-ancha-dreams-taste.alert :type="'warning'"/>
                @endif
                <div class="row ms-3 mb-4">
                    @if(count($products) == 0)
                        <div class="text-center fs-3">Nenhum produto foi registado</div>
                    @else
                        @foreach ($products as $product)
                            <x-ancha-dreams-taste.product-card :productmodel="$product"/>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>