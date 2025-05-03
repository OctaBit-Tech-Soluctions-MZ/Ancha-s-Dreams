<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Fale Connosco'" :heading="'Estamos aqui para ouvir e ajudar você'"/>
    <div class="container mt-5">
        <h2 class="text-center text-primary">Entre em Contato</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensagem</label>
                        <textarea class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4 class="text-primary">Informações de Contato</h4>
                <p><i class="bi bi-geo-alt-fill"></i>   Maputo, Moçambique</p>
                <p><i class="bi bi-envelope-fill"></i>Contato@alagoana.com</p>
                <p><i class="bi bi-phone-fill"></i> +258 841234567</p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center text-primary">Nossa Localização</h3>
        <div class="d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?..." width="100%" height="300" style="border:0;" allowfullscreen></iframe>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-primary text-center">Perguntas Frequentes</h3>
        <div class="accordion mt-3" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Como posso entrar em contato?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show">
                    <div class="accordion-body">Você pode nos contatar via telefone, e-mail ou formulário acima.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Qual o horário de atendimento?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">Nosso horário é de segunda a sexta, das 8h às 18h.</div>
                </div>
            </div>
        </div>
    </div>
</div>

