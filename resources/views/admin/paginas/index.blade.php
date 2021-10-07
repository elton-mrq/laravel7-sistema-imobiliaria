@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Páginas</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.paginas') }}" class="breadcrumb">Lista de Páginas</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($paginas as $pagina)
                        <tr>
                            <td>{{ $pagina->id }}</td>
                            <td>{{ $pagina->titulo }}</td>
                            <td>{{ $pagina->descricao }}</td>
                            <td>{{ $pagina->tipo }}</td>
                            <td>
                                <a href="{{ route('admin.paginas.editar', $pagina->id) }}" class="btn orange">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
