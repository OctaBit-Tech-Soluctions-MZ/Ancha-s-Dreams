<div class="mt--90 p-3">
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Inicio', 'url' => route('home')],
    ['label' => 'Meu Carrinho', 'url' => null],
    ],
    'pageTitle' => 'Meu Carrinho'
    ])
    <div class="row">
        @if (session('success'))
        <x-ancha-dreams-taste.alert :type="'success'" />
        @elseif (session('warning'))
        <x-ancha-dreams-taste.alert :type="'warning'" />
        @endif
        {{--
        <x-ancha-dreams-taste.masthead :subHeading="'Sabores que Conectam!'"
            :heading="'Sabores com paixão para momentos inesquecíveis.'" /> --}}
        <div class="col-12">
            <div class="card shadow p-3 border border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Produto/cursos/livro</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody wire:pull.30s>
                                        @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/'.$item->options->cover) }} "
                                                    alt="{{$item->name}}" title="{{$item->name}}" class="rounded me-3"
                                                    height="64">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html"
                                                        class="text-body">{{$item->name}}</a>
                                                </p>
                                            </td>
                                            <td>
                                                {{$item->price}}
                                            </td>
                                            <td>
                                                @if($item->allow_multiple)
                                                <input type="number" min="1" value="{{$item->qty}}" class="form-control"
                                                    placeholder="Qty" style="width: 90px;">
                                                @else
                                                <span>{{ $item->qty }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click='removeToCart("{{$item->rowId}}")'> <i
                                                        class="feather-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="apps-ecommerce-products.html"
                                        class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                        <i class="feather-arrow-left"></i> voltar </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a role="button" class="btn btn-danger" wire:click='sendOrder' wire:loading.attr='disabled'>
                                            <div wire:loading>
                                                <span class="btn-text">Processando...</span>
                                                <span class="btn-icon me-1 spinner-border spinner-border-sm me-1"
                                                    role="status" aria-hidden="true"></span>

                                            </div>
                                            <span wire:loading.remove>
                                                <i class="mdi mdi-cart-plus me-1"></i> Finalizar Pedido
                                            </span>
                                        </a>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="p-3 mt-4 mt-lg-0 rounded border">
                                <h4 class="header-title mb-3">Resumo do Pedido</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Preço Total :</td>
                                                <td>{{ Gloudemans\Shoppingcart\Facades\Cart::priceTotal(); }} Meticais
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>

                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>