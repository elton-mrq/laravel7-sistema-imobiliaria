@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Adicionar Cidades</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.cidades') }}" class="breadcrumb">Lista de Cidades</a>
                    <a class="breadcrumb">Adicionar Cidades</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.cidades.salvar') }}" method="POST">
                {{ csrf_field() }}
                @include('admin.cidades._form')
                <button class="btn blue" type="submit">Salvar</button>
            </form>
        </div>
    </div>

@endsection
