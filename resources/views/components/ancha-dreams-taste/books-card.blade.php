            <!-- Start Single Product  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="rbt-default-card style-three rbt-hover">
                    <div class="inner">
                        <div class="content pt--0 pb--10">
                            <h2 class="title"><a href="#">{{ $book->title }}</a></h2>

                            <span class="team-form">
                                <span class="location">{{ $book->author }}</span>
                            </span>
                        </div>
                        <div class="thumbnail"><a href="#"><img src="{{ asset('storage/books/'.$book->cover)}}" alt="Histudy Book Image"></a></div>
                        <div class="content">
                            <div class="rbt-price justify-content-center mt--10">
                                <span class="current-price theme-gradient">{{ $book->price }} mzn</span>
                                <span class="off-price">{{ $book->price + $book->price+0.29 }} mzn</span>
                            </div>
                            <div class="addto-cart-btn mt--20">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" role="button"
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
                                >
                                    <span class="icon-reverse-wrapper">
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