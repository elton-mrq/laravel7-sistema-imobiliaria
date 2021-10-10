@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Adicionar Slides</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.slides') }}" class="breadcrumb">Lista de Slides</a>
                    <a class="breadcrumb">Adicionar Slide</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.slides.salvar') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                @include('admin.slides._form')
                <button class="btn blue" type="submit">Salvar</button>
            </form>
        </div>
    </div>

@endsection
