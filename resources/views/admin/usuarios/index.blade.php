@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Usuários</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de Usuários</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @can('usuario_editar')
                                    <a href="{{ route('admin.usuarios.editar', $usuario->id) }}" class="btn orange">Editar</a>
                                @endcan

                                <a href="{{ route('admin.usuarios.perfil', $usuario->id) }}" class="btn blue">Perfis</a>

                                @can('usuario_deletar')
                                    <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.usuarios.deletar', $usuario->id) }}' }" class="btn red">Excluir</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.usuarios.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
