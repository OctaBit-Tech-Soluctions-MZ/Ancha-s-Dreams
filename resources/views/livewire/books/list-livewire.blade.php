<div class="mt--35">
    <div class="row rbt-tutor-information-right">
        <div class="d-flex justify-content-start ps-3">
            <a class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" href="{{ route('books.register') }}"
                wire:navigate>
                <span class="icon-reverse-wrapper">
                    <span class="btn-text ms-2 me-2">Adicionar novo livro</span>
                    <span class="btn-icon"><i class="feather-plus-square"></i></span>
                    <span class="btn-icon"><i class="feather-plus-square"></i></span>
                </span>
            </a>
        </div>
    </div>
    <div class="row mt--20">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Livros</h4>
                    <p class="text-muted font-14 mb-2">
                        Aqui encontraras a lista de todos os livros registado na sistema.
                    </p>
                    @if(session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'" />
                    @endif
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Capa</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Preço</th>
                                    <th>Publica</th>
                                    <th>É Digital?</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>
                                        <div class="avatar-sm">
                                            <img src="{{ asset('storage/books/'.$book->cover)}}" alt=""
                                                class="img-thumbnail">
                                        </div>
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{!! $book->published? '<span class="badge bg-success">Publicado</span>' : '<span
                                            class="badge bg-danger">Não Publicado</span>' !!}</td>
                                    <td>{{ $book->is_digital? 'Sim' : 'Não' }}</td>
                                    <td class="d-flex flex-column gap-1">
                                        <div>
                                            @if($book->published)
                                            <a href="#" class="rbt-btn-link text-decoration-none"
                                                wire:click='publish({{$book->id}},false)'>
                                                <i class="feather-eye-off me-2"></i>Despublicar
                                            </a>
                                            @else

                                            <a href="#" class="rbt-btn-link text-decoration-none"
                                                wire:click='publish({{$book->id}},true )'>
                                                <i class="feather-eye me-2"></i>Publicar
                                            </a>
                                            @endif
                                        </div>
                                        <div>
                                            <a class="rbt-btn-link text-decoration-none"
                                                href="{{ route('books.edit', ['slug' => $book->slug]) }}" wire:navigate>
                                                <i class="me-2 feather-edit"></i>Editar</a>
                                        </div>
                                        <div>
                                            <a class="rbt-btn-link text-decoration-none"
                                                wire:click='destroy("{{ $book->slug }}")' href="#" role="button"
                                                wire:confirm='Tem certeza que deseja excluir o Livro {{$book->title}}?'>
                                                <i class="me-2 feather-trash"></i>Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end preview-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    <x-ancha-dreams-taste.modals.confirm-modal />
</div>