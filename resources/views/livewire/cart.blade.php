<div>
    <div>
        <h3>Carrinho de Compras</h3>
        <ul>
            @foreach($cart as $item)
                <li>
                    {{ $item['name'] }} ({{ $item['quantity'] }}x) - R$ {{ $item['price'] }}
                    <button wire:click="removeFromCart({{ $item['id'] }})">Remover</button>
                </li>
            @endforeach
        </ul>
    
        <p><strong>Total:</strong> R$ {{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}</p>
    </div>    
</div>
