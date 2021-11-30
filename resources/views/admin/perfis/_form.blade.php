<div class="input-field">
    <input type="text" class="validate" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
    <label for="name">Nome</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
    <label for="name">Descrição</label>
</div>

