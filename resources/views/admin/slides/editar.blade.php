@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Editar Slide</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.slides') }}" class="breadcrumb">Lista de Slides</a>
                    <a class="breadcrumb">Editar Imagem</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.slides.atualizar', $registro->id) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                @include('admin.slides._form')
                <button class="btn blue" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
