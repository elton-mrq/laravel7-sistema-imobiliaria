@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Editar Perfil de Usuário</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.perfil') }}" class="breadcrumb">Lista de Perfis de Usuários</a>
                    <a class="breadcrumb">Editar Perfil de Usuário</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.perfil.atualizar', $registro->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                @include('admin.perfis._form')
                <button class="btn blue" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

@endsection
