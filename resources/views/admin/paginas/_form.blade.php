<div class="input-field">
    <input type="text" class="validate" name="titulo" value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
    <label for="name">Título</label>
</div>

<div class="input-field">
    <input type="text" class="validate" name="descricao" value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
    <label for="name">Descrição</label>
</div>

@if ($pagina->email)
    <div class="input-field">
        <input type="email" class="validate" name="email" value="{{ isset($pagina->email) ? $pagina->email : '' }}">
        <label for="name">E-mail</label>
    </div>
@endif

<div class="input-field">
    <textarea name="texto" class="materialize-textarea">{{ isset($pagina->texto) ? $pagina->texto : '' }}</textarea>
    <label for="name">Texto</label>
</div>

<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" name="imagem" id="">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
        @if ($pagina->imagem)
            <img width="120" src="{{ asset($pagina->imagem) }}" >
        @endif
    </div>
</div>

<div class="input-field">
    <textarea name="mapa" class="materialize-textarea">{{ isset($pagina->mapa) ? $pagina->mapa : '' }}</textarea>
    <label for="name">Mapa</label>
</div>

