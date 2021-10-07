@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Adicionar Imagem</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imóveis</a>
                    <a href="{{ route('admin.galerias', $imovel->id) }}" class="breadcrumb">Galeria de Imagens</a>
                    <a class="breadcrumb">Adicionar Imagem</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.galerias.salvar', $imovel->id) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                @include('admin.galerias._form')
                <button class="btn blue" type="submit">Salvar</button>
            </form>
        </div>
    </div>

@endsection
