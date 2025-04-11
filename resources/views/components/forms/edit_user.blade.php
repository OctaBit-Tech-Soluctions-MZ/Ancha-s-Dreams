

<div class="mb-3">
    <label class="form-label" for="name">Nome</label>
    <input type="text" class="form-control" placeholder="Digite seu nome" id="name"
        name="name" value="{{ $user->name }}">
</div>
<div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input type="text" class="form-control" placeholder="Digite seu email" id="email"
        name="email" value="{{ $user->email }}">
</div>