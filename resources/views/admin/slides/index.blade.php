@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Lista de Slides</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.slides') }}" class="breadcrumb">Lista de Slides</a>
                  </div>
                </div>
              </nav>
        </div>

        <div class="row">
             <table>
                <thead>
                    <th>Ordem</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Publicado</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->ordem }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ $registro->descricao }}</td>
                            <td>{{ $registro->publicado }}</td>
                            <td><img src="{{ asset($registro->imagem) }}" alt="Imagem do Imóvel" width="100"></td>
                            <td>
                                <a href="{{ route('admin.slides.editar', $registro->id) }}" class="btn orange">Editar</a>
                                <a href="javascript: if(confirm('Deseja realmente deletar o registro?')){ window.location.href='{{ route('admin.slides.deletar', $registro->id) }}' }" class="btn red">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <a href="{{route('admin.slides.adicionar')}}" class="btn blue">Adicionar</a>
        </div>

    </div>

@endsection
