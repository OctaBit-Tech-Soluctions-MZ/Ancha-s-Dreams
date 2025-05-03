<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Bem vindo a nossa Plataforma!'" :heading="'PRAZER EM CONHECER TE'"/>
    <section class="container my-5">
        <div class="row align-items-center">
            <!-- Imagem ao lado (Reduzida) -->
            <div class="col-md-6 text-center img p-2">
                <img src="{{ asset('assets/img/culinary_classes_online.png') }}" 
                     alt="Culinária" 
                     class="img-fluid" 
                     style="max-width: 80%; height: auto;">
            </div>
            <!-- Texto Sobre Nós -->
            <div class="col-md-6 p-3" id="nos">
                <h2 class="fw-bold">Domine a arte da culinária no conforto do seu lar!</h2>
                <p class="text-muted">
                    Somos apaixonados por gastronomia e acreditamos que qualquer pessoa pode cozinhar pratos incríveis. 
                    Nossa plataforma ensina receitas detalhadas, técnicas culinárias e segredos de chefs renomados. 
                </p>
                <p class="text-muted">
                    Junte-se a nós e transforme sua cozinha em um verdadeiro laboratório de sabores!
                </p>
            </div>
        </div>
    </section>


    <section class="container my-5 bg-primary p-3">
        <div class="row align-items-center">
            <!-- Texto Sobre Nós -->
            <div class="col-md-6 p-4">
                <h1 class="fw-bold text-white">Dê vida às suas receitas! Aprenda, pratique e compartilhe sua paixão pela culinária.</h1>
            </div>
            <!-- Imagem ao lado (Reduzida) -->
            <div class="col-md-6 text-center img p-2">
                <img src="{{ asset('assets/img/make_cake.png') }}" 
                     alt="Culinária" 
                     class="img-fluid" 
                     style="max-width: 80%; height: auto;">
            </div>
        </div>
    </section>

    <!-- Services-->
    <section class="container">
        <div>
            <div class="row text-center">
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 border rounded shadow img">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Receitas Exclusivas</h4>
                        <p class="text-muted">Compartilhe e descubra receitas incríveis com a nossa comunidade!</p>
                    </div>
                </div>
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 border rounded shadow">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-mobile-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsivo</h4>
                        <p class="text-muted">Estude onde e quando quiser no seu dispositivo preferido.</p>
                    </div>
                </div>
                <div class="col-md-4 p-2 text-center">
                    <div class="card p-4 border rounded shadow img">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-seedling fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Culinária Saudável</h4>
                        <p class="text-muted">Aprenda a preparar receitas saudáveis e nutritivas.</p>
                    </div>
                </div>
            </div>
            
    </section>

    <div class="rev-section">

        <h2 class="title">Experiências de quem já aprendeu!</h2>
        <p class="note text-primary">Confira as experiências e histórias de quem transformou sua paixão pela culinária com a nossa plataforma!</p>
        
        <div class="reviews">
        
        <div class="review">
           <div class="body-review">
              <div class="name-review">Nathan D.</div>
              <div class="role-review text-primary">Aluno</div>
              <div class="rating">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half"></i>
              </div>
              <div class="desc-review">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati eligendi suscipit illum officia ex eos.</div>
           </div>
        </div>
        <div class="review">
           <div class="body-review">
              <div class="name-review">Mary Will</div>
              <div class="role-review text-primary">Aluno</div>
              <div class="rating">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
              </div>
              <div class="desc-review">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati eligendi suscipit illum officia ex eos.</div>
           </div>
        </div>
        <div class="review">
           <div class="body-review">
              <div class="name-review">Kevin Tuck</div>
              <div class="role-review text-primary">Instrutor</div>
              <div class="rating">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half"></i>
              </div>
              <div class="desc-review">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati eligendi suscipit illum officia ex eos.</div>
           </div>
        </div>
        
        </div>
        
        </div>

    <!-- Contact-->
    <section class="page-section m-2 d-flex justify-content-center" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase fw-bold">Compartilhe a sua experiência</h2>
                
            </div>
            <form id="contactForm" class="p-4 shadow rounded bg-white">
                <div class="row">
                    <div class="form-group mb-3">
                        <textarea class="form-control p-3 rounded" 
                            id="message" placeholder="Sua experiência*" rows="5" required></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary px-4 py-2 rounded text-uppercase fw-bold" id="submitButton" type="submit"><span>Enviar</span></button>
                </div>
            </form>
        </div>
    </section>
</div>
