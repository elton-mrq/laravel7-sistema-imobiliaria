@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Adicionar Tipos</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.tipos') }}" class="breadcrumb">Lista de Tipos</a>
                    <a class="breadcrumb">Adicionar Tipos</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.tipos.salvar') }}" method="POST">
                {{ csrf_field() }}
                @include('admin.tipos._form')
                <button class="btn blue" type="submit">Salvar</button>
            </form>
        </div>
    </div>

@endsection
