<!-- Start Single Product  -->
<div class="col-lg-4 col-md-6 col-12">
    <div class="rbt-default-card style-three rbt-hover">
        <div class="inner">
            <div class="content pt--0 pb--10">
                <h4 class="title" style="font-size: 17px !important"><a href="#">{{ $book->title }}</a></h4>

                <span class="team-form">
                    <span class="location">{{ $book->author }}</span>
                </span>
            </div>
            <div class="thumbnail"><a href="#"><img src="{{ asset('storage/books/'.$book->cover)}}"
                        alt="Histudy Book Image"></a></div>
            <div class="content">
                <div class="rbt-price justify-content-center mt--10">
                    <span class="current-price theme-gradient">{{ $book->price }} mzn</span>
                    <span class="off-price">{{ $book->price + $book->price+0.29 }} mzn</span>
                </div>
                <div class="addto-cart-btn mt--20">
                    <a class="rbt-btn btn-gradient hover-icon-reverse" role="button"
                        wire:click='addToCart({{$book->id}})' wire:loading.attr='disabled'>
                        <div wire:loading>
                            <span class="btn-text">Adicionando no carinha...</span>
                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1" role="status"
                                aria-hidden="true"></span>

                        </div>
                        <span class="icon-reverse-wrapper" wire:loading.remove>
                            <span class="btn-text">Adici. no carinho</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Product  -->