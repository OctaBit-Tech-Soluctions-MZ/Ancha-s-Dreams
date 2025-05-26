<div class="rbt-course-top-wrapper mt--40 mt_sm--20 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                    <div class="rbt-short-item">
                        <form action="{{ $route }}" class="rbt-search-style me-0">
                            <input type="text" placeholder="{{ $placeholder }}" wire:model.live="search">
                            <button type="submit" class="rbt-search-btn rbt-round-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="rbt-short-item">
                        <div class="view-more-btn text-start text-sm-end">
                            <button class="discover-filter-button discover-filter-activation rbt-btn btn-md radius-round">Filtros<i class="fas fa-filter"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Filter Toggle  -->
        <div class="default-exp-wrapper default-exp-expand" style="display: none;">
            <form class="filter-inner" method="GET" action="{{ $route }}">
                <div class="filter-select-option">
                    <div class="filter-select rbt-modern-select">
                        <span class="select-label d-block">Ordenar Por</span>
                        <div class="dropdown bootstrap-select">
                            <select class="" wire:model.live='orderBy'>
                                <option selected="selected">Padrão</option>
                                <option>Ultimo Adicionado</option>
                                <option>Popularidade</option>
                                <option>Nome: A-Z</option>
                                <option>Nome: Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="filter-select-option">
                    <div class="filter-select rbt-modern-select">
                        <span class="select-label d-block">Filtrar Por {{$person}}</span>
                        <div class="dropdown bootstrap-select show-tick">
                            <select title="Select Author">
                                <option data-subtext="Experts">Janin Afsana</option>
                                <option data-subtext="Experts">Joe Biden</option>
                                <option data-subtext="Experts">Fatima Asrafy</option>
                                <option data-subtext="Experts">Aysha Baby</option>
                                <option data-subtext="Experts">Mohamad Ali</option>
                                <option data-subtext="Experts">Jone Li</option>
                                <option data-subtext="Experts">Alberd Roce</option>
                                <option data-subtext="Experts">Zeliski Noor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="filter-select-option">
                    <div class="filter-select">
                        <div class="price_filter s-filter clear">
                            <div class="slider__range--output">
                                <div class="price__output--wrap">
                                    <div class="price--filter">
                                        <button type="submit" class="rbt-btn btn-gradient btn-sm">Aplicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Filter Toggle  -->
    </div>
</div>
<!-- End Course Top  -->