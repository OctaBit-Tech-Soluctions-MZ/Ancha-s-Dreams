<div class="mt--35">
    <div class="row mt--20">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cursos</h4>
                    <p class="text-muted font-14">
                        Aqui encontraras a lista de todos os Cursos registado na sistema.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless mb-0" id="courses-datatable">
                            <thead>
                                <tr>
                                    <th>Capa</th>
                                    <th>Curso</th>
                                    <th>Instrutor</th>
                                    <th>Preço</th>
                                    <th>Publicado?</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>
                                        <div class="avatar-md">
                                            <img src="{{ asset('storage/courses/'.$course->cover)}}" alt=""
                                                class="img-thumbnail">
                                        </div>
                                    </td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->users->name. ' '.$course->users->surname }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{!! $course->published? '<span class="badge bg-success">Publicado</span>' : '<span class="badge bg-danger">Não Publicado</span>' !!}</td>
                                    <td>
                                        <div>
                                            @if($course->published)
                                            <a href="#" class="rbt-btn-link text-decoration-none" wire:click='publish({{$course->id}},false)' wire:confirm='Tem certeza que deseja realizar a operação?'>
                                                <i class="feather-eye-off me-2"></i>Despublicar
                                            </a>
                                            @else

                                            <a href="#" class="rbt-btn-link text-decoration-none" wire:click='publish({{$course->id}},true )' wire:confirm='Tem certeza que deseja realizar a operação?'>
                                                <i class="feather-eye me-2"></i>Publicar
                                            </a>
                                            @endif
                                        </div>
                                        <div>
                                            <a role="button" class="rbt-btn-link text-decoration-none" wire:click='setId({{ $course->id }})'
                                               data-bs-toggle="modal" data-bs-target="#confirmModal">
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
</div>