@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Cidades</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.cidades') }}" class="breadcrumb">Lista de Cidades</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Sigla Estado</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->estado }}</td>
                            <td>{{ $registro->sigla_estado }}</td>
                            <td>
                                <a href="{{ route('admin.cidades.editar', $registro->id) }}" class="btn orange">Editar</a>
                                <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.cidades.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.cidades.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
