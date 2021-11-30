@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Perfis de {{ $usuario->name }}</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de Usuários</a>
                    <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Perfis</a>
                  </div>
                </div>
              </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.usuarios.perfil.salvar', $usuario->id) }}" method="POST">
                {{ csrf_field() }}
                <select name="perfil_id" id="">
                    @foreach ($perfis as $perfil)
                        <option value="{{$perfil->id}}">{{ Str::upper($perfil->nome) }}</option>
                    @endforeach
                </select>
                <button class="btn blue">Adicionar</button>
            </form>
        </div>
        <div class="row">
             <table>
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($usuario->listaPerfil as $perfil)
                        <tr>
                            <td>{{ $perfil->nome }}</td>
                            <td>{{ $perfil->descricao }}</td>
                            <td>
                                <a href="javascript: if(confirm('Deseja realmente remover esse perfil?')){ window.location.href='{{ route('admin.usuarios.perfil.remover', [$usuario->id, $perfil->id]) }}' }" class="btn red">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
