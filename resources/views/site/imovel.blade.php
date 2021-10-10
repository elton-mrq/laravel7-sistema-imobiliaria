@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 align="center">Imóvel</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            @if ($imovel->galeria()->count())
                <div class="row">
                    <div class="slider">
                        <ul class="slides">
                            @foreach ($galeria as $imagem)
                                <li>
                                    <img src="{{ asset($imagem->imagem) }}" alt="1 Detalhe Imóvel">
                                    <div class="caption {{ $direcaoImagem[rand(0,2)] }}">
                                        <h3>{{$imagem->titulo}}</h3>
                                        <h5>{{$imagem->descricao}}</h5>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row" align="center">
                    <button class="btn blue"  onclick="sliderPrev()">Anterior</button>
                    <button class="btn blue"  onclick="sliderNext()">Próximo</button>
                </div>
            @else
                <img class="responsive-img" src="{{ asset($imovel->imagem) }}">
            @endif

        </div>
        <div class="col s12 m4">
            <h4>{{ $imovel->titulo }}</h4>
            <blockquote>
                {{$imovel->descricao}}
            </blockquote>
            <p><b>Código: </b> {{$imovel->id}}</p>
            <p><b>Status: </b> {{$imovel->status}}</p>
            <p><b>Tipo: </b> {{$imovel->tipo->titulo}}</p>
            <p><b>Cidade: </b> {{$imovel->cidade->nome}}</p>
            <p><b>Valor: </b> R$ {{ number_format($imovel->valor, 2, ',', '.') }}</p>
            <a href="{{ route('site.contato') }}" class="btn deep-orange darken-1">Entre em contato</a>
        </div>
    </div>
</div>
@endsection
