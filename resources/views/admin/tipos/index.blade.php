@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Tipos</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.tipos') }}" class="breadcrumb">Lista de Tipos</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>
                                <a href="{{ route('admin.tipos.editar', $registro->id) }}" class="btn orange">Editar</a>
                                <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.tipos.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.tipos.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
