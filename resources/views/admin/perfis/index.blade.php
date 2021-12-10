@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Perfis de Usuários</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.perfil') }}" class="breadcrumb">Lista de Perfis de Usuários</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->descricao }}</td>
                            <td>
                                @if ($registro->nome != 'admin')
                                    @can('perfil_editar')
                                        <a href="{{ route('admin.perfil.editar', $registro->id) }}" class="btn orange">Editar</a>
                                    @endcan
                                    <a href="{{ route('admin.perfil.permissao', $registro->id) }}" class="btn blue">Permissao</a>
                                    @can('perfil_deletar')
                                        <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.perfil.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                                    @endcan
                                @else
                                    <a href="" class="btn orange disabled">Editar</a>
                                    <a href="" class="btn red disabled">Excluir</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.perfil.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
