<div class="input-field">
    <input type="text" class="validate" name="name" value="{{ isset($usuario->name) ? $usuario->name : '' }}">
    <label for="name">Nome</label>
</div>
<div class="input-field">
    <input type="email" class="validate" name="email" value="{{ isset($usuario->email) ? $usuario->email : '' }}">
    <label for="email">E-mail</label>
</div>
<div class="input-field">
    <input type="password" class="validate" name="password">
    <label for="password">Senha</label>
</div>
