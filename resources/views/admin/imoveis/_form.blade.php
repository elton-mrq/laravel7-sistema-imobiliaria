<div class="input-field">
    <input type="text" class="validate" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
    <label for="name">Título</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
    <label for="descricao">Descrição</label>
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
       @if (isset($registro->imagem))
            <img width='120' src="{{asset($registro->imagem)}}" alt="">
       @endif
    </div>
</div>
<div class="input-field">
    <select name="status">
        <option value="aluga" {{(isset($registro->status) && $registro->status == 'aluga' ? 'selected' : '')}}>Aluga</option>
        <option value="vende" {{(isset($registro->status) && $registro->status == 'vende' ? 'selected' : '')}}>Vende</option>
    </select>
    <label for="status">Status</label>
</div>

<div class="input-field">
    <select name="tipo_id">
        @foreach ($tipos as $tipo)
            <option value="{{$tipo->id}}" {{(isset($registro->tipo_id) && $registro->tipo_id == $tipo->id ? 'selected' : '')}}>{{$tipo->titulo}}</option>
        @endforeach
    </select>
    <label for="tipo_id">Tipo do Imóvel</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="cep" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
    <label for="endereco">CEP</label>
</div>
<div class="input-field">
    <select name="cidade_id">
        @foreach ($cidades as $cidade)
            <option value="{{$cidade->id}}" {{(isset($registro->cidade_id) && $registro->cidade_id == $cidade->id ? 'selected' : '')}}>{{$cidade->nome}}</option>
        @endforeach
    </select>
    <label for="tipo_id">Cidade</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="valor" value="{{ isset($registro->valor) ? $registro->valor : '' }}">
    <label for="endereco">Valor</label>
</div>
<div class="input-field">
    <input type="number" class="validate" name="dormitorios" value="{{ isset($registro->dormitorios) ? $registro->dormitorios : '' }}">
    <label for="dormitorios">Quantidade Dormitórios</label>
</div>
<div class="input-field">
    <input type="text" class="validate" name="detalhes" value="{{ isset($registro->detalhes) ? $registro->detalhes : '' }}">
    <label for="detalhes">Detalhes</label>
</div>

<div class="input-field">
    <textarea name="mapa" class="materialize-textarea">{{isset($registro->mapa) ? $registro->mapa : ''}}</textarea>
    <label for="mapa">Mapa</label>
</div>
<div class="input-field">
    <select name="publicar">
        <option value="nao" {{(isset($registro->publicar) && $registro->publicar == 'nao' ? 'selected' : '')}}>Não</option>
        <option value="sim" {{(isset($registro->publicar) && $registro->publicar == 'sim' ? 'selected' : '')}}>Sim</option>
    </select>
    <label for="status">Publicar</label>
</div>


