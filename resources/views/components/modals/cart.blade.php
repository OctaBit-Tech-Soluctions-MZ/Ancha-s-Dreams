    <!-- Modal Cart -->
    <div class="modal col-12 fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="rbt-cart-area bg-color-white">
                    <div class="cart_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                  <h2 class="mb-4">Seu Carrinho</h2>
                                
                                  <div class="mb-4">
                                    <button class="btn btn-outline-danger" onclick="confirmClearCart()"><i class="fas fa-trash"></i> Esvaziar Carrinho</button>
                                  </div>
                                        <!-- Cart Table -->
                                        <div class="cart-table table-responsive mb--60">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="pro-thumbnail">Imagem</th>
                                                        <th class="pro-title">Produto</th>
                                                        <th class="pro-price">Preço</th>
                                                        <th class="pro-quantity">Quantidade</th>
                                                        <th class="pro-subtotal">Total</th>
                                                        <th class="pro-remove">Remover</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cart-body">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                      
                                        <div class="text-end mt-3">
                                          <h4>Total Geral: <span id="cart-total">0.00</span> MZN</h4>
                                          <button class="btn btn-success mt-2" onclick="enviarPedido()"><i class="fas fa-shopping-cart"></i> Finalizar Compra</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
