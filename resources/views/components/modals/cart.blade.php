    <!-- Modal Cart -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h2 class="mb-4">Seu Carrinho</h2>
                      
                        <div class="mb-4">
                          <button class="btn btn-outline-danger" onclick="confirmClearCart()">🗑️ Esvaziar Carrinho</button>
                        </div>
                      
                        <table class="table table-bordered" id="cart-table">
                          <thead>
                            <tr>
                              <th>Produto</th>
                              <th>Preço</th>
                              <th>Quantidade</th>
                              <th>Total</th>
                              <th>Ações</th>
                            </tr>
                          </thead>
                          <tbody id="cart-body">
                            <!-- Conteúdo será inserido via JS -->
                          </tbody>
                        </table>
                      
                        <div class="text-end mt-3">
                          <h4>Total Geral: <span id="cart-total">0.00</span> MZN</h4>
                          <button class="btn btn-success mt-2" onclick="enviarPedido()">🛒 Finalizar Compra</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
