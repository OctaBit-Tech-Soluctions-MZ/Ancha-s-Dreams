@extends('layouts.admin')

@section('title', 'Livros | '.Auth::user()->name)

@section('page', 'Lista de Livros')
 
@section('content')
                <div class="p-3">
                    <div class="panel card shadow border border-0 mb-3">
                        <form action="{{ route('instructor.courses') }}" method="get">
                            <div class="row p-3">
                                <div class="col-sm-4 mb-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="pesquisar por nome...">
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <select name="category" class="form-select form-select-sm">
                                        <option value="" selected>Selecione uma categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <select name="order_by" class="form-select form-select-sm">
                                        <option value="" selected>Ordenar Por</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Aplicar Filtros</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success m-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger m-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="panel card shadow border border-0">
                        <div class="d-flex justify-content-start p-2">
                            <a href="{{ route('admin.books.register') }}" class="btn btn-success btn-sm">Registar Livro</a>
                        </div>
                        
                    @if (count($books) == 0 && $search)
                        <div class="p-3 text-center">
                            nao foi possivel encontrar um livro com {{ $search }} <a href="{{ route('admin.books') }}">Ver todos Livros</a>
                        </div>
                    @elseif (count($books) == 0)
                        <div class="p-3">
                            <div class="text-warning">
                                Nenhum livro foi registado
                            </div>
                        </div>
                    @else
                        <!-- DataTales Example -->
                        <div class="panel-body bio-graph-info">
                            <div class="card-body">
                                <div class="table-responsive">

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table table-bordered table-striped" id="dataTable">
                                        <thead class="table-dark">
                                            <tr class="border border-0">
                                                <th class="border border-0">#</th>
                                                <th class="border border-0">Nome do Livro</th>
                                                <th class="border border-0">Categoria</th>
                                                <th class="border border-0">Preço do Livro</th>
                                                <th class="border border-0">Acção</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            
                                            @foreach ($books as $book)
                                            <tr>
                                                <td> {{ $loop->index + 1 }} </td>
                                                <td> {{ $book->title }} </td>
                                                <td> {{ $book->category }} </td>
                                                <td> {{ $book->price }} MZN</td>
                                                <td> 
                                                    <a href="{{$book->slug}}" 
                                                        class="btn btn-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal" 
                                                        data-action=""
                                                        href="#"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                {{-- {{ $courses->onEachSide(3)->links() }} --}}
                            </div>
                        </div>
                    @endif
                    </div>
                </div>

@endsection