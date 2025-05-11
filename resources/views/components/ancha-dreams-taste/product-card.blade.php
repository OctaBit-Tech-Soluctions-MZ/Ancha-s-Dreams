<!-- Start Single Product  -->
<div class="col-lg-4 col-md-6 col-12">
    <div class="rbt-default-card style-three rbt-hover text-start">
        <div class="inner">
            <div class="content pt--0 pb--10">
                <h4 class="text-start">{{ $productmodel->name }}</h4>
            </div>
            <div class="thumbnail"><a href="#"><img src="{{ asset('storage/products/'.$productmodel->image)}}"
                        alt="Histudy product Image"></a></div>
            <div class="content">
                <div class="rbt-price justify-content-start mt--10">
                    <span class="current-price theme-gradient">{{ $productmodel->price }} mzn</span>
                    <span class="off-price">{{ $productmodel->price + $productmodel->price+0.29 }} mzn</span>
                </div>
                <div class="addto-cart-btn justify-content-start mt--20">
                    <a class="rbt-btn-link" role="button">
                        <i class="feather-shopping-cart"></i> Adicionar no carinho
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Product  -->