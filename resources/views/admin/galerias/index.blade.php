@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Galeria de Imagens</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Imóveis</a>
                    <a href="{{ route('admin.galerias', $imovel->id) }}" class="breadcrumb">Galeria de Imagens</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Ordem</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ $registro->descricao }}</td>
                            <td><img src="{{ asset($registro->imagem) }}" alt="Imagem do Imóvel" width="100"></td>
                            <td>{{$registro->ordem}}</td>
                            <td>
                                <a href="{{ route('admin.galerias.editar', $registro->id) }}" class="btn orange">Editar</a>
                                <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.galerias.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.galerias.adicionar', $imovel->id)}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
