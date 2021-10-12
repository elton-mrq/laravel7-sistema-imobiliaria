@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h3 align="center">Contato</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m6">
            <div class="video-controller">
                @if (isset($pagina->mapa))
                    {!! $pagina->mapa !!}
                @else
                    <img src="{{asset($pagina->imagem)}}" alt="" class="responsive-img">
                @endif
            </div>

        </div>
        <div class="col s12 m5">
            <h4>{{$pagina->titulo}}</h4>
            <blockquote>{{$pagina->descricao}}</blockquote>
            <form action="{{route('site.contato.enviar')}}" method="POST" class="col s12">
                {{ csrf_field() }}
                <div class="input-field">
                    <input type="text" class="validate" name="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field">
                    <input type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <textarea name="mensagem" class="materialize-textarea" required></textarea>
                    <label for="mensagem">Mensagem</label>
                </div>
                <button class="btn blue">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
