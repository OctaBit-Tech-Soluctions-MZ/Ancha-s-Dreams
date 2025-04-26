
function getCart() {
    return JSON.parse(localStorage.getItem('cart')) || [];
  }

  function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
  }

  function clearCart() {
    localStorage.removeItem('cart');
  }

  function confirmClearCart() {
    if (confirm("Tem certeza que deseja esvaziar o carrinho?")) {
      clearCart();
      renderCart();
      renderButtons();
    }
  }

  function addToCart(product) {
    let cart = getCart();
    const index = cart.findIndex(item => item.id === product.id);

    if (index !== -1) {
      if (!product.allow_multiple) {
        alert('Este produto só pode ser adicionado uma vez.');
        return;
      }
      cart[index].quantity += 1;
    } else {
      cart.push({ ...product, quantity: 1 });
    }

    saveCart(cart);
    renderCart();
    renderButtons();
    alert('Produto adicionado com sucesso!');
  }

  function handleAddToCart(button) {
    const product = {
      id: parseInt(button.dataset.id),
      name: button.dataset.name,
      price: parseFloat(button.dataset.price),
      path_photo: button.dataset.path_photo,
      allow_multiple: button.dataset.allow_multiple === 'true',
      folder: button.dataset.folder,
      type: button.dataset.type
    };
    addToCart(product);
  }

  function updateQuantity(id, qty) {
    qty = parseInt(qty);
    let cart = getCart();
    const index = cart.findIndex(item => item.id === id);

    if (index !== -1) {
      cart[index].quantity = qty > 0 ? qty : 1;
      saveCart(cart);
      renderCart();
    }
  }

  function removeFromCart(id) {
    let cart = getCart().filter(item => item.id !== id);
    saveCart(cart);
    renderCart();
    renderButtons();
  }

  function renderCart() {
    const cart = getCart();
    const cartBody = document.getElementById('cart-body');
    const cartTotal = document.getElementById('cart-total');
    cartBody.innerHTML = '';
    let totalGeral = 0;

    if (cart.length === 0) {
      cartBody.innerHTML = `<tr><td colspan="5" class="text-center">Seu carrinho está vazio.</td></tr>`;
    } else {
      cart.forEach(item => {
        const total = item.price * item.quantity;
        totalGeral += total;
        cartBody.innerHTML += `
          <tr>
          <td class="pro-thumbnail"><img src="{{ asset('assets/img/${item.path_photo}" alt="Product"></a></td>
            <td class="pro-title">${item.name}</td>
            <td class="pro-price">${item.price.toFixed(2)} MZN</td>
            <td class="pro-quantity">
              ${item.allow_multiple ? `
                <input type="number" min="1" value="${item.quantity}" onchange="updateQuantity(${item.id}, this.value)">
              ` : item.quantity}
            </td>
            <td class="pro-subtotal">${total.toFixed(2)} MZN</td>
            <td class="pro-remove">
              <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.id})">Remover</button>
            </td>
          </tr>
        `;
      });
    }

    cartTotal.innerText = totalGeral.toFixed(2);
  }

  function renderButtons() {
    const cart = getCart();
    cart.forEach(item => {
      if (!item.allow_multiple) {
        const btn = document.getElementById(`btn-add-${item.id}`);
        if (btn) {
          btn.disabled = true;
          btn.innerText = '✔️ Já no Carrinho';
        }
      }
    });
  }

  async function enviarPedido() {
    const cart = getCart();
    try {
      const response = await fetch('/checkout', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ cart })
      });

      const result = await response.json();
      if (response.ok) {
        alert('Pedido enviado com sucesso!');
        clearCart();
        renderCart();
        renderButtons();
        window.location.href = '/pedido/sucesso';
      } else {
        alert(result.error || 'Erro ao processar pedido.');
      }
    } catch (error) {
      alert('Erro ao enviar pedido.');
      console.error(error);
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    renderCart();
    renderButtons();
  });