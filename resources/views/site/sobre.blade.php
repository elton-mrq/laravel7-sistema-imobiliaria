@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 align="center">Sobre</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m6">
            <div class="video-container">
                @if (isset($pagina->mapa))
                    {!! $pagina->mapa !!}
                @else
                    <img src="{{asset($pagina->imagem)}}" alt="" class="responsive-img">
                @endif
            </div>
        </div>
        <div class="col s12 m6">
            <h4>{{$pagina->titulo}}</h4>
            <blockquote>
                {{$pagina->descricao}}
            </blockquote>
            <p>{{$pagina->texto}}</p>
        </div>
    </div>
</div>
@endsection
