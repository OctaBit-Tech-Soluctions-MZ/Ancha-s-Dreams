<div class="mt--110">
    <div class="container bootstrap snippets bootdey" style="font-size: 13px;">
        <div class="row">
            <x-ancha-dreams-taste.sidebar-profile />
            <div class="profile-info col-md-9">
                <div class="panel card shadow border border-0">
                    <div class="bio-graph-heading bg-dark">
                        Aprendendo, cozinhando e evoluindo! Aqui para explorar novos sabores e aprimorar minhas
                        habilidades culinárias.
                    </div>
                    <div class="panel-body bio-graph-info p-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Historico de Pedidos</h4>
                                        @if (session('success'))
                                        <x-ancha-dreams-taste.alert :type="'success'" />
                                        @endif
                                        <div class="table-responsive" wire:poll.30s>
                                            <table id="datatable-buttons"
                                                class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <span class="text-muted font-13">Id do Pedido</span>
                                                            <h5 class="font-14 mt-1 fw-normal">#{{ $order->id}}</h5>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Items do Pedido</span> <br>
                                                            <h5 class="font-14 my-1 row">
                                                                @foreach($order->order_items as $item)
                                                                <div
                                                                    class="text-body d-flex justify-content-between w-100 p-2">
                                                                    <div>
                                                                        @if(!empty($item->itemable->name))
                                                                        {{ $item->itemable->name }}
                                                                        @elseif(!empty($item->itemable->title))
                                                                        {{ $item->itemable->title }}
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm ms-2 d-flex justify-content-center"
                                                                            {{$order->status == 'concluido' ||
                                                                            $order->status == 'cancelado'
                                                                            || count($order->order_items) <= 1
                                                                                ? 'disabled' : '' }} wire:confirm='Tem certeza que deseja excluir o item
                                                        {{$item->itemable->name}}'
                                                                                wire:click='removeItem({{$item->id}})'>
                                                                                <i class="feather-x"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
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
                                                            <span class="text-muted font-13">Enviado: </span>
                                                            <h5 class="font-14 mt-1 fw-normal">{{
                                                                humanTime($order->created_at)}}</h5>
                                                        </td>
                                                        <td class="table-action" id="tooltip-container2">
                                                            @if($order->status == 'pendente')
                                                            <a role="button" class="btn btn-danger btn-sm"
                                                                wire:click='cancelOrder({{$order->id}}, "cancelado", "Pedido cancelado com sucesso")'
                                                                wire:confirm='Tem certeza que deseja realizar a operação?'>
                                                                <i class="mdi mdi-alpha-x-circle"
                                                                    style="font-size: 17px"></i>
                                                                cancelar
                                                            </a>
                                                            @elseif($order->status == 'concluido' || $order->status == 'cancelado')
                                                            <span class="bg-secondary p-2 rounded text-white">Acção Indisponivel</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                            <!-- Paginação -->
                                            <div class="mt-2">
                                                {{ $orders->onEachSide(3)->links() }}
                                            </div>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>