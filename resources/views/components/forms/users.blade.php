            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input type="text" class="form-control" placeholder="Digite seu nome" id="name"
                    name="name" :value="old('name')">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" placeholder="Digite seu email" id="email"
                    name="email" :value="old('email')">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password_confirmation" >Confirmar Senha</label>
                <input type="password" class="form-control" placeholder="Confirme sua senha" id="password_confirmation"
                    name="password_confirmation">
            </div>