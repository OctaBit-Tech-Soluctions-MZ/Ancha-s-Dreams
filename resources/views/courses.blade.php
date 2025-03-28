@extends('layouts.app')

@section('title', 'Cursos')
 
@section('content')

        <!-- Seção de Cursos -->
        <section class="p-3">
            <div class="container mt-4">
                <div class="container text-center">
                    <h2 class="fw-bold">Os <span class="text-success">nossos cursos</span> de culinária</h2>
                    <p class="text-muted">São 100% digitais e com um método inovador.</p>
                    
                    <div class="p-3">
                        <div class="shadow p-4">
                            <form action="" method="get" class="row form-filter">
                                <div class="col-md-4 p-2">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="pesquise aqui...">
                                </div>
                                <div class="col-md-4 p-2">
                                    <select name="category" id="category" class="form-control">
                                        <option>Selecione uma categoria</option>
                                        <option>Alimentos</option>
                                        <option>Açúcar & Adoçantes</option>
                                        <option>Alimentos Para Bebês</option>
                                        <option>Batata e Cebola</option>
                                        <option>Cereais e Farinhas</option>
                                    </select>
                                </div>
                                <div class="col-md-4 p-2">
                                    <select name="order_by" id="order_by" class="form-control">
                                        <option>Ordernar Por</option>
                                        <option>A-Z</option>
                                        <option>Recentes</option>
                                        <option>Populares</option>
                                    </select>
                                </div>
                                <div class="col-md-4 p-2 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary btn-tx"><span class="me-1">Pesquisar</span><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-3 curso popular">
                            <div class="card">
                                <img src="/assets/img/maxresdefault-2-870x440.jpg" class="card-img-top" alt="Curso 1">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Curso de Fast Food</h5>
                                    <p class="card-text">Aprenda a fazer hambúrgueres artesanais e outros lanches.</p>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <span class="fw-bold text-success">MT 2,500</span>
                                        <a href="{{ route('courses.details') }}" class="btn btn-success">Ver Mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 curso recente">
                            <div class="card">
                                <img src="./assets/img/pretzel-870x440.png" class="card-img-top" alt="Curso 2">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Confeitaria Profissional</h5>
                                    <p class="card-text">Domine a arte da confeitaria e faça bolos incríveis.</p>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <span class="fw-bold text-success">MT 3,000</span>
                                        <a href="{{ route('courses.details') }}" class="btn btn-success">Ver Mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-3 curso popular">
                            <div class="card">
                                <img src="./assets/img/sobremesas-de-pascoa-10-receitas-deliciosas-para-adocar-o-feriado-870x440.jpg" class="card-img-top" alt="Curso 3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Culinária Internacional</h5>
                                    <p class="card-text">Descubra sabores do mundo com receitas autênticas.</p>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <span class="fw-bold text-success">MT 2,800</span>
                                        <a href="{{ route('courses.details') }}" class="btn btn-success">Ver Mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-3 curso recente">
                            <div class="card">
                                <img src="./assets/img/Takeaway-main-scaled-750x500-1-870x440.jpg" class="card-img-top" alt="Curso 4">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Cozinha Saudável</h5>
                                    <p class="card-text">Aprenda a preparar refeições saborosas e equilibradas.</p>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <span class="fw-bold text-success">MT 2,200</span>
                                        <button class="btn btn-success">Comprar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection