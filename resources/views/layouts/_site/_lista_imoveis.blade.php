<div class="row section">
    <h3 align="center">Imóveis</h3>
    <div class="divider"></div>
    <br>
    @include('layouts._site._filtro')
</div>
<div class="row section">

    @foreach ($imoveis as $imovel)
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <a href="{{ route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')]) }}"><img src="{{asset($imovel->imagem)}}" alt=""></a>
                </div>
                <div class="card-content">
                    <p><b class="deep-orange-text darken-1">{{ ucfirst($imovel->status) }}</b></p>
                    <p><b>{{ $imovel->titulo }}</b></p>
                    <p>{{ $imovel->descricao }}</p>
                    <p>R$ {{ number_format($imovel->valor, 2, ',', '.') }}</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')]) }}">Ver mais</a>
                </div>
            </div>
        </div>
    @endforeach

</div>

	<div align="center" class="row">
		{{ $imoveis->links() }}
	</div>
