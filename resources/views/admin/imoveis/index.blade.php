@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Imoveis</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imóveis</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Status</th>
                    <th>Cidade</th>
                    <th>Valor</th>
                    <th>Imagem</th>
                    <th>Publicado</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ $registro->status }}</td>
                            <td>{{ $registro->cidade->nome }}</td>
                            <td>R$ {{ number_format($registro->valor, 2, ',', '.') }}</td>
                            <td><img src="{{ asset($registro->imagem) }}" alt="Imagem do Imóvel" width="100"></td>
                            <td>{{ $registro->publicar }}</td>
                            <td>
                                <a href="{{ route('admin.imoveis.editar', $registro->id) }}" class="btn orange">Editar</a>
                                <a href="{{ route('admin.galerias', $registro->id) }}" class="btn green">Galeria</a>
                                <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.imoveis.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.imoveis.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
