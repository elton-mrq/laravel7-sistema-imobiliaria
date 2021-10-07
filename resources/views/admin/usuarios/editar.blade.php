@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Editar Usuário</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de Usuários</a>
                    <a class="breadcrumb">Editar Usuário</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.usuarios.atualizar', $usuario->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                @include('admin.usuarios._form')
                <button class="btn blue" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
