<div>
    <div class="row">
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-award text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $courses }}</span></h3>
            <p class="text-muted font-15 mb-0">Cursos Registados</p>
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-book text-muted" style="font-size: 24px;"></i>
            <h3><span> {{$books}} </span></h3>
            <p class="text-muted font-15 mb-0">Livros Registados</p>
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-users-alt text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $users }}</span></h3>
            <p class="text-muted font-15 mb-0">Utilizadores</p>
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-package text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $orders_count }}</span></h3>
            <p class="text-muted font-15 mb-0">Pedidos Pendentes</p>
        </x-ancha-dreams-taste.card-dashboard>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Status de Pedidos</h4>

                    <div class="my-4 chartjs-chart" style="height: 202px;">
                        <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                    </div>

                    <div class="row text-center mt-2 py-2">
                        <div class="col-4">
                            <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>{{ $concluido }}%</span>
                            </h3>
                            <p class="text-muted mb-0">Completo</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>{{ $pendente }}%</span>
                            </h3>
                            <p class="text-muted mb-0"> Pendente</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>{{ $cancelado }}%</span>
                            </h3>
                            <p class="text-muted mb-0"> Cancelado</p>
                        </div>
                    </div>
                    <!-- end row-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Pedidos</h4>
                    @if (session('success'))
                    <x-ancha-dreams-taste.alert :type="'success'" />
                    @endif
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <span class="text-muted font-13">Items do Pedido</span> <br>
                                        <h5 class="font-14 my-1 row">
                                            @foreach($order->order_items as $item)
                                            <span class="text-body">
                                                @if(!empty($item->itemable->name))
                                                Curso de {{ $item->itemable->name }}
                                                @elseif(!empty($item->itemable->title))
                                                {{ $item->itemable->title }}
                                                @endif
                                            </span>
                                            @endforeach
                                        </h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Status</span> <br>
                                        @if($order->status == 'pendente')
                                        <span class="badge badge-warning-lighten">Pendente</span>
                                        @elseif($order->status == 'cancelado')
                                        <span class="badge badge-danger-lighten">Cancelado</span>
                                        @elseif($order->status == 'concluido')
                                        <span class="badge badge-success-lighten">Concluido</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Feito Por</span>
                                        <h5 class="font-14 mt-1 fw-normal">{{ $order->users->name}}</h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Enviado: </span>
                                        <h5 class="font-14 mt-1 fw-normal">{{ humanTime($order->created_at)}}</h5>
                                    </td>
                                    <td class="table-action" id="tooltip-container2">
                                        @if($order->status == 'pendente')
                                        <a role="button" class="btn btn-success btn-sm"
                                            data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Confirmar Pedido"
                                            wire:click='confirmOrder({{$order->id}}, "concluido", "Pedido confirmado com sucesso")'
                                            wire:confirm='Tem certeza que deseja realizar a operação?'>
                                            <i class="mdi mdi-checkbox-marked-circle" style="font-size: 17px"></i> confirmar
                                        </a>
                                        @elseif($order->status == 'concluido')
                                        <a role="button" class="btn btn-danger btn-sm"
                                            data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Reverter Pedido"
                                            wire:click='reverse({{$order->id}}, "pendente", "Acção revertida com sucesso")'
                                            wire:confirm='Tem certeza que deseja realizar a operação?'>
                                            <i class="mdi mdi-undo" style="font-size: 17px"></i> reverter
                                        </a>
                                        @else
                                        <span disabled role="button" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-alpha-x-circle"></i> Cancelado
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <script>
        var pendente = {{ $pendente }};
        var concluido = {{ $concluido }};
        var cancelado = {{ $cancelado }};
        
    </script>
</div>