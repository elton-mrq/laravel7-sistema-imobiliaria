@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <h3>Adicionar Perfis de Usuários</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.perfil') }}" class="breadcrumb">Lista de Perfis de Usuários</a>
                    <a class="breadcrumb">Adicionar Perfis de Usuários</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
            <form action="{{ route('admin.perfil.salvar') }}" method="POST">
                {{ csrf_field() }}
                @include('admin.perfis._form')
                <button class="btn blue" type="submit">Salvar</button>
            </form>
        </div>
    </div>

@endsection
