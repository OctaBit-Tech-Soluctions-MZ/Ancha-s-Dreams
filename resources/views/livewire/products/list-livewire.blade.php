<div class="mt--25">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('products.register') }}" class="btn btn-danger mb-2" wire:navigate><i class="mdi mdi-plus-circle me-2"></i> Adicionar novo produto</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th class="all">Produto</th>
                                    <th>Adicionado em</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Status</th>
                                    <th style="width: 85px;">Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/products/'.$product->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="apps-ecommerce-products-details.html" class="text-body">{{ $product->name }}</a>
                                            <br>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                        </p>
                                    </td>
                                    <td>
                                        @php
                                           echo humanTime($product->created_at)
                                        @endphp
                                    </td>
                                    <td>
                                        {{ $product->price }} MZN
                                    </td>

                                    <td>
                                        {{ $product->qtd }}
                                    </td>
                                    <td>
                                        {!!$product->published ? '<span class="badge bg-success">Publicado</span>' :
                                            '<span class="badge bg-danger">Não Publicado</span>'!!}
                                    </td>

                                    <td class="table-action">
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
