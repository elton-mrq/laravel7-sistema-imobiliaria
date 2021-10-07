<div class="input-field">
    <input type="text" class="validate" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
    <label for="name">Nome</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
    <label for="name">Estado</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="sigla_estado" value="{{ isset($registro->sigla_estado) ? $registro->sigla_estado : '' }}">
    <label for="name">Sigla Estado</label>
</div>
