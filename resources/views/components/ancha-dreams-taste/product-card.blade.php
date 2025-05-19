<div class="product col-md-3 card shadow mb-4">
    <span class="product__price">{{ $productmodel->price }} mzn</span>
    <img class="product__image" src="{{ asset('storage/products/'.$productmodel->image)}}" style="height: 300px">
    <h1 class="product__title">{{ $productmodel->name }}</h1>
    <hr />
    <p class="text-wrap"><x-ancha-dreams-taste.short-text :text="$productmodel->description" :limit="90"/></p>
    <button type="button" class="product__btn btn btn-danger" wire:click='addToCart({{$productmodel->id}})'>Adcionar no carrinho</button>
</div>