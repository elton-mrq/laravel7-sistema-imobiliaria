@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Editar Páginas</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.paginas') }}" class="breadcrumb">Lista de Páginas</a>
                    <a class="breadcrumb">Editar Página</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.paginas.atualizar', $pagina->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                @include('admin.paginas._form')
                <button class="btn blue" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
