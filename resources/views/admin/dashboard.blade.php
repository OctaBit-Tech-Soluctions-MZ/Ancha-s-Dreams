@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow card_dash h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Alunos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger card_dash shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Instrutores</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $instructors }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger card_dash shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Cursos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courses }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-certificate fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger card_dash shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Livros</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $books }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-md-6 mb-2">
    <div class="card shadow border border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-light text-grey">
                        <tr class="border border-0">
                            <th class="border border-0">#</th>
                            <th class="border border-0">Id Do Pedido</th>
                            <th class="border border-0">Cliente</th>
                            <th class="border border-0">Items do Pedido</th>
                            <th class="border border-0">Valor Total</th>
                            <th class="border border-0">Status</th>
                            <th class="border border-0">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-0 text-grey-500"><span>1</span></td>
                            <td class="border border-0"><span>AUS245HSHBC877</span></td>
                            <td class="border border-0"><span>Huren Vicente Pelembe</span></td>
                            <td class="border border-0"><span>1 - Cursos de Culinaria X
                                                        2 - Livro X
                                                        3 - Utilisilio X </span>
                            </td>
                            <td class="border border-0"><span> 4000 Mzn</span></td>
                            <td class="border border-0 d-flex justify-content-center"><div class="bg-warning rounded-circle p-2" style="width: 25%"></div></td>
                            <td class="border border-0">
                                <form method="POST" action="{{ route('admin.dashboard') }}" class="d-flex justify-content-between gap-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="checkbox" name="check" id="check">
                                    <input type="checkbox" name="cancel" id="cancel">
                                    <label for="check" class="fa fa-check btn btn-success btn-sm"></label>
                                    <label for="cancel" class="fa fa-cancel btn btn-danger btn-sm"></label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-0"><span>2</span></td>
                            <td class="border border-0"><span>AUS245HSHBC877</span></td>
                            <td class="border border-0"><span>Huren Vicente Pelembe</span></td>
                            <td class="border border-0"><span>1 - Cursos de Culinaria X
                                                        2 - Livro X
                                                        3 - Utilisilio X </span>
                            </td>
                            <td class="border border-0"><span> 4000 Mzn</span></td>
                            <td class="border border-0 d-flex justify-content-center"><div class="bg-warning rounded-circle p-2" style="width: 25%"></div></td>
                            <td class="border border-0">
                                <div class="d-flex justify-content-between gap-1">
                                    <a href="" class="fa fa-check btn btn-success btn-sm"></a>
                                    <a href="" class="fa fa-cancel btn btn-danger btn-sm"></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-0"><span>3</span></td>
                            <td class="border border-0"><span>AUS245HSHBC877</span></td>
                            <td class="border border-0"><span>Huren Vicente Pelembe</span></td>
                            <td class="border border-0"><span>1 - Cursos de Culinaria X
                                                        2 - Livro X
                                                        3 - Utilisilio X </span>
                            </td>
                            <td class="border border-0"><span> 4000 Mzn</span></td>
                            <td class="border border-0 d-flex justify-content-center"><div class="bg-danger rounded-circle p-2" style="width: 25%"></div></td>
                            <td class="border border-0">
                                <div class="d-flex justify-content-between gap-1">
                                    <a href="" class="fa fa-check btn btn-success btn-sm"></a>
                                    <a href="" class="fa fa-cancel btn btn-danger btn-sm"></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-0"><span>4</span></td>
                            <td class="border border-0"><span>AUS245HSHBC877</span></td>
                            <td class="border border-0"><span>Huren Vicente Pelembe</span></td>
                            <td class="border border-0"><span>1 - Cursos de Culinaria X
                                                        2 - Livro X
                                                        3 - Utilisilio X </span>
                            </td>
                            <td class="border border-0"><span> 4000 Mzn</span></td>
                            <td class="border border-0 d-flex justify-content-center"><div class="bg-success rounded-circle p-2" style="width: 25%"></div></td>
                            <td class="border border-0">
                                <div class="d-flex justify-content-between gap-1">
                                    <a href="" class="fa fa-check btn btn-success btn-sm"></a>
                                    <a href="" class="fa fa-cancel btn btn-danger btn-sm"></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-0"><span>5</span></td>
                            <td class="border border-0"><span>AUS245HSHBC877</span></td>
                            <td class="border border-0"><span>Huren Vicente Pelembe</span></td>
                            <td class="border border-0"><span>1 - Cursos de Culinaria X
                                                        2 - Livro X
                                                        3 - Utilisilio X </span>
                            </td>
                            <td class="border border-0"><span> 4000 Mzn</span></td>
                            <td class="border border-0 d-flex justify-content-center"><div class="bg-success rounded-circle p-2" style="width: 25%"></div></td>
                            <td class="border border-0">
                                <div class="d-flex justify-content-between gap-1">
                                    <a href="" class="fa fa-check btn btn-success btn-sm"></a>
                                    <a href="" class="fa fa-cancel btn btn-danger btn-sm"></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex gap-1 justify-content-start">
                    <div class="mb-2">
                        <span class="text-success rounded-cicle p-2"><strong> Confirmado</strong></span>
                    </div>
                    <div class="mb-2">
                        <span class="text-danger rounded-cicle p-2 w-25"><strong>Cancelado</strong></span>
                    </div>
                    <div class="mb-2">
                        <span class="text-warning rounded-cicle p-2 w-25"><strong>Pendente</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection