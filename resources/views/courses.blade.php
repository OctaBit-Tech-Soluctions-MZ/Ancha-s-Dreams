@extends('layouts.app')

@section('title', 'Cursos')

@section('subheading', 'Os nossos cursos de culinária')

@section('headingtext', 'São 100% digitais e com um método inovador.')

@section('content')

        <!-- Seção de Cursos -->
        <section class="p-1">
            <div class="container mt-4">
                <div class="container text-center">
                    <h5 class="mb-4 mt-4">
                        <i class="bi bi-chevron-right"></i> <strong>CONHEÇA OS CURSOS E VEJA O QUE VOCÊ VAI APRENDER</strong>
                    </h5>


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
                                <div class="filter-inner">
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
                                            <span class="select-label d-block">Short By Offer</span>
                                            <div class="dropdown bootstrap-select"><select class="">
                                                <option selected="selected">Free</option>
                                                <option>Paid</option>
                                                <option>Premium</option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Free"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Free</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-3" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div>
                                    </div>
        
                                    <div class="filter-select-option">
                                        <div class="filter-select rbt-modern-select">
                                            <span class="select-label d-block">Short By Category</span>
                                            <div class="dropdown bootstrap-select"><select data-live-search="true" class="">
                                                <option selected="selected">Web Design</option>
                                                <option>Graphic</option>
                                                <option>App Development</option>
                                                <option>Figma Design</option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-4" aria-haspopup="listbox" aria-expanded="false" title="Web Design"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Web Design</div></div> </div></button><div class="dropdown-menu "><div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off" role="combobox" aria-label="Search" aria-controls="bs-select-4" aria-autocomplete="list"></div><div class="inner show" role="listbox" id="bs-select-4" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div>
                                    </div>
        
                                    <div class="filter-select-option">
                                        <div class="filter-select">
                                            <span class="select-label d-block">Price Range</span>
        
                                            <div class="price_filter s-filter clear">
                                                <form action="#" method="GET">
                                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 18.3673%; width: 40.8163%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 18.3673%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 59.1837%;"></span></div>
                                                    <div class="slider__range--output">
                                                        <div class="price__output--wrap">
                                                            <div class="price--output">
                                                                <span>Price :</span><input type="text" id="amount" value="$100 - $300">
                                                            </div>
                                                            <div class="price--filter">
                                                                <a class="rbt-btn btn-gradient btn-sm" href="#">Filter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
        
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Filter Toggle  -->
                        </div>
                    </div>
                    <!-- End Course Top  -->
                    @if (empty($courses))
                        <div class="alert alert-danger">
                            Nenhum Curso foi registado
                        </div>
                    @else
                        <div class="row g-5">
                            {{-- Courses Card Blade Components path:resource/components/course-card.blade.php --}}
                            <x-course-card :courses="$courses"  />
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            {{ $courses->links() }}
                        </div>
                    @endif
                </div>
            </div>
    </section>
@endsection
