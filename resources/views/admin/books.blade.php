@extends('layouts.admin')

@section('title', 'Livros | '.Auth::user()->name)
 
@section('content')
                <div class="p-3">   
                    <div class="p-2">
                        <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2 mb-2"
                            href="{{ route('admin.books.register') }}">
                            <span class="icon-reverse-wrapper g-2">
                                <span class="btn-text ms-1 me-1">Novo Livro</span>
                                <span class="btn-icon">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                                <span class="btn-icon">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                            </span>
                        </a>
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
                        
                        <x-modern-table :title="'Lista de Livros'">
                            <x-slot:header>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Livro</th>
                                    <th>Autor</th>
                                    <th>Preço do Livro</th>
                                    <th>Acção</th>
                                </tr>
                            </x-slot:header>
                                @foreach ($books as $book)
                                    <tr class="text-capitalize">
                                        <td> {{ $loop->index + 1 }} </td>
                                        <td> {{ $book->title }} </td>
                                        <td> {{ $book->author }} </td>
                                        <td> {{ $book->price }} MZN</td>
                                        <td class="d-flex gap-1"> 
                                            <a href="{{$book->slug}}" 
                                                class="rbt-badge-5 bg-color-primary-opacity color-primary" title="editar livro"><i class="fas fa-edit"></i></a>                                            
                                                <a class="rbt-badge-5 bg-color-danger-opacity color-danger" title="remover livro" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal" 
                                                data-action=""
                                                href="#"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </x-modern-table>
                         <div class="d-flex justify-content-center p-2">
                                {{-- {{ $courses->onEachSide(3)->links() }} --}}
                        </div>
                    @endif
                </div>

@endsection