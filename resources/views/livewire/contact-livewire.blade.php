<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Fale Connosco'" :heading="'Estamos aqui para ouvir e ajudar você'"/>
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Comece a Falar <span class="text-primary">Connosco</span></h3>
                        <p class="text-muted mt-2">Please fill out the following form and we will get back to you shortly. For more 
                            <br>information please contact us.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-md-4">
                    <p class="text-muted"><span class="fw-bold">Telefone:</span><br> <span class="d-block mt-1">+1 234 56 7894</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Endereço de Email:</span><br> <span class="d-block mt-1">info@gmail.com</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Endereço Fisico:</span><br> <span class="d-block mt-1">4461 Cedar Street Moro, AR 72368</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Horario de Expediente:</span><br> <span class="d-block mt-1">9:00AM To 6:00PM</span></p>
                </div>

                <div class="col-md-8">
                    <form>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Seu Nome</label>
                                    <input class="form-control form-control-light" type="text" id="fullname" placeholder="Nome...">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Seu Email</label>
                                    <input class="form-control form-control-light" type="email" required="" id="emailaddress" placeholder="Digite seu email...">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="subject" class="form-label">Assunto</label>
                                    <input class="form-control form-control-light" type="text" id="subject" placeholder="Digite o assunto...">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="comments" class="form-label">Mensagem</label>
                                    <textarea id="comments" rows="4" class="form-control form-control-light" placeholder="Escreva a sua mensagem aqui..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary">Enviar Mensagem <i class="mdi mdi-telegram ms-1"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->
    <div class="container mt-5">
        <h3 class="text-center text-primary">Nossa Localização</h3>
        <div class="d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?..." width="100%" height="300" style="border:0;" allowfullscreen></iframe>
        </div>
    </div>

    <div class="container mt-5 mb-4">
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

