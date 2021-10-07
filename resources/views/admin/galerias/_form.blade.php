

@if (isset($registro->imagem))

    <div class="input-field">
        <input type="text" class="validate" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
        <label for="name">Título</label>
    </div>
    <div class="input-field">
        <input type="text" class="validate" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
        <label for="descricao">Descrição</label>
    </div>
    <div class="input-field">
        <input type="text" class="validate" name="ordem" value="{{ isset($registro->ordem) ? $registro->ordem : '' }}">
        <label for="descricao">Ordem</label>
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
            <img width='120' src="{{asset($registro->imagem)}}" alt="">
        </div>
    </div>

@else

    <div class="row">
        <div class="file-field input-field col m12 s12">
            <div class="btn">
                <span>Upload de Imagens</span>
                <input type="file" multiple name="imagens[]" id="">
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validate">
            </div>
        </div>
    </div>

@endif




