<div class="rbt-course-top-wrapper mt--40 mt_sm--20 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                    <div class="rbt-short-item">
                        <form action="{{route('courses')}}" class="rbt-search-style me-0">
                            <input type="text" placeholder="Pesquise o seu curso" name="search">
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
                        <span class="select-label d-block">Short By</span>
                        <div class="dropdown bootstrap-select"><select class="">
                            <option selected="selected">Default</option>
                            <option>Latest</option>
                            <option>Popularity</option>
                            <option>Trending</option>
                            <option>Price: low to high</option>
                            <option>Price: high to low</option>
                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Default"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Default</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                    </div>
                </div>

                <div class="filter-select-option">
                    <div class="filter-select rbt-modern-select">
                        <span class="select-label d-block">Short By Author</span>
                        <div class="dropdown bootstrap-select show-tick"><select data-live-search="true" title="Select Author" multiple="multiple" data-size="7" data-actions-box="true" data-selected-text-format="count &gt; 2" class="">
                            <option data-subtext="Experts">Janin Afsana</option>
                            <option data-subtext="Experts">Joe Biden</option>
                            <option data-subtext="Experts">Fatima Asrafy</option>
                            <option data-subtext="Experts">Aysha Baby</option>
                            <option data-subtext="Experts">Mohamad Ali</option>
                            <option data-subtext="Experts">Jone Li</option>
                            <option data-subtext="Experts">Alberd Roce</option>
                            <option data-subtext="Experts">Zeliski Noor</option>
                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle bs-placeholder btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" title="Select Author"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Select Author</div></div> </div></button><div class="dropdown-menu "><div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off" role="combobox" aria-label="Search" aria-controls="bs-select-2" aria-autocomplete="list"></div><div class="bs-actionsbox"><div class="btn-group btn-group-sm"><button type="button" class="actions-btn bs-select-all btn btn-light">Select All</button><button type="button" class="actions-btn bs-deselect-all btn btn-light">Deselect All</button></div></div><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1" aria-multiselectable="true"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                    </div>
                </div>

                <div class="filter-select-option">
                    <div class="filter-select rbt-modern-select">
                        <span class="select-label d-block">Filtrar Por Categoria</span>
                        <div class="dropdown bootstrap-select">
                            <select name="categories">
                                <div class="bg-dark">
                                    <option value="" selected="select">Selecione a categoria do curso</option>
                                    @foreach ($categories as $category)    
                                        <option value="{{ $category->name }}"><span>{{ $category->name }}</span></option>
                                    @endforeach
                                </div>
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
                                        <button type="submit" class="rbt-btn btn-gradient btn-sm">Aplicar os Filtros</button>
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