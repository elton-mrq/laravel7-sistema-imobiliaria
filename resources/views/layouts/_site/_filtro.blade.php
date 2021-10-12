<div class="row">
    <form action="{{route('site.busca')}}">
        <div class="input-field col s6 m4">
            <select name="status">
                <option {{ (isset($busca['status']) && $busca['status'] == 'todos') }}value="todos">Aluga e Vende</option>
                <option {{ (isset($busca['status']) && $busca['status'] == 'aluga') ? 'selected' : '' }} value="aluga">Aluga</option>
                <option {{ (isset($busca) && $busca['status'] == 'vende') ? 'selected' : '' }} value="vende">Vende</option>
            </select>
            <label>Status</label>
        </div>
        <div class="input-field col s6 m4">
            <select name='tipo_id'>
                <option value="todos" {{ (isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos') ? 'selected' : '' }}>Todos os Tipos</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ (isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id) ? 'selected' : '' }} >{{ Str::ucfirst($tipo->titulo) }}</option>
                @endforeach
            </select>
            <label>Tipo</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade_id">
                <option value="todos" {{ (isset($busca['cidade_id']) && $busca['cidade_id'] == 'todos') ? 'selected' : '' }}>Todas as Cidades</option>
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}" {{ (isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id) ? 'selected' : '' }}>{{ Str::upper($cidade->nome) }}</option>
                @endforeach
            </select>
            <label>Cidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select name="dormitorios">
                <option value="0" {{ (isset($busca['dormitorios']) && $busca['dormitorios'] == 0) ? 'selected' : '' }}>Todas as Quantidades</option>
                <option value="1" {{ (isset($busca['dormitorios']) && $busca['dormitorios'] == 1 ? 'selected' : '') }}>1</option>
                <option value="2" {{ (isset($busca['dormitorios']) && $busca['dormitorios'] == 2 ? 'selected' : '') }}>2</option>
                <option value="3" {{ (isset($busca['dormitorios']) && $busca['dormitorios'] == 3 ? 'selected' : '') }}>3</option>
                <option value="4" {{ (isset($busca['dormitorios']) && $busca['dormitorios'] == 4 ? 'selected' : '') }}>Mais</option>
            </select>
            <label>Dormitórios</label>
        </div>
        <div class="input-field col s12 m4">
            <select name="valor">
                <option value="0" {{ (isset($busca['valor']) && $busca['valor'] == '0') ? 'selected' : '' }}>Todos os valores</option>
                <option value="1" <?php echo((isset($busca['valor']) && $busca['valor'] == 1) ? 'selected' : '') ?> >Até R$ 500,00</option>
                <option value="2" {{ (isset($busca['valor']) && $busca['valor'] == 2) ? 'selected' : '' }} >De R$ 500,00 a R$ 1.000,00</option>
                <option value="3" {{ (isset($busca['valor']) && $busca['valor'] == 3) ? 'selected' : '' }}>De R$ 1.001,00 a R$ 5.000,00</option>
                <option value="4" {{ (isset($busca['valor']) && $busca['valor'] == 4) ? 'selected' : '' }}>De R$ 5001,00 a R$ 10.000,00</option>
                <option value="5" {{ (isset($busca['valor']) && $busca['valor'] == 5) ? 'selected' : '' }}>De R$ 10.001,00 a R$ 50.000,00</option>
                <option value="6" {{ (isset($busca['valor']) && $busca['valor'] == 6) ? 'selected' : '' }}>De R$ 50.001,00 a R$ 100.000,00</option>
                <option value="7" {{ (isset($busca['valor']) && $busca['valor'] == 7) ? 'selected' : '' }}>De R$ 100.001,00 a R$ 200.000,00</option>
                <option value="8" {{ (isset($busca['valor']) && $busca['valor'] == 8) ? 'selected' : '' }}>De R$ 200.001,00 a R$ 300.000,00</option>
                <option value="9" {{ (isset($busca['valor']) && $busca['valor'] == 9) ? 'selected' : '' }}>De R$ 300.001,00 a R$ 500.000,00</option>
                <option value="10" {{ (isset($busca['valor']) && $busca['valor'] == 10) ? 'selected' : '' }}>De R$ 500.001,00 a R$ 1.000.000,00</option>
                <option value="11" {{ (isset($busca['valor']) && $busca['valor'] == 11) ? 'selected' : '' }}>Acima de R$ 1.000.000,00</option>
            </select>
            <label for="">Valor</label>
        </div>
        <div class="input-field col s12 m3">
            <input type="text" class="validate" name="bairro" value="{{ (isset($busca['bairro'])) ? $busca['bairro'] : '' }}">
            <label>Bairro</label>
        </div>
        <div class="input-field col s12 m2">
            <button class="btn deep-orange darken-1">Filtar</button>
        </div>
    </form>
</div>
