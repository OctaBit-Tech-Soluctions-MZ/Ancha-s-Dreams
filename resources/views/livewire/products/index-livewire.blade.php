<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Sabores que Conectam!'" :heading="'Sabores com paixão para momentos inesquecíveis.'"/>
    <div class="container p-5">
        <div class="row">
            <!-- Lista de Produtos -->
            <div class="row">
                <h2 class="mb-2 text-center"><i class="feather-book"></i> Culinária de qualidade, entregue à sua porta.</h2>
                <div class="p-3">
                    <x-ancha-dreams-taste.filter :route="route('books')" :placeholder="'o seu produto'" :person="'Autor'"/>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <x-ancha-dreams-taste.product-card :productmodel="$product"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>