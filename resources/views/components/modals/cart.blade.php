    <!-- Modal Cart -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Seu Carrinho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php $cart = session('cart', []); @endphp
                    @if($cart)
                        <ul>
                            @foreach($cart as $id => $item)
                                <li>
                                    <img src="{{ asset('assets/img/courses/'.$item['photo']) }}" alt="" srcset=""><strong>{{ $item['name'] }}</strong> - {{ $item['quantity'] }} x {{ $item['price'] }} MZN
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Carrinho vazio.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <form id="cartForm" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Fazer Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
