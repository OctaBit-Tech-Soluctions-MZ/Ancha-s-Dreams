<!-- Start Single Course  -->
<div class="col-lg-4 col-md-6 col-12">
    <div class="rbt-card variation-01 rbt-hover">
        <div class="rbt-card-img">
            <a>
                <img src="{{ asset('assets/img/books/'.$book->image_path)}}" alt="Card image">
            </a>
        </div>
        <div class="rbt-card-body">
            <h4 class="rbt-card-title text-start">
                <span>
                    {{ $book->title }}</span>
            </h4>
            <x-short-text class="" :text="$book->description" :limit="60"/>
            <div class="rbt-card-bottom">
                <div class="rbt-price">
                    <span class="current-price fs-6">{{ $book->price }} mzn</span>
                </div>
                <a class="rbt-btn-link text-decoration-none" role="button"
                @auth
                    onclick="handleAddToCart(this)"
                    data-id="{{ $book->id }}"
                    data-name="{{ $book->title }}"
                    data-price="{{ $book->price }}"
                    data-type="Livros"
                    data-allow_multiple="false"
                    id="btn-add-{{ $book->id }}"
                    data-photo="books/{{ $book->image_path }}"
                @endauth
                >Adici. no carinho<i class="ms-2 fa fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
</div>