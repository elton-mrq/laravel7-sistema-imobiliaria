@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Permissões para o perfil de {{ $perfil->nome }}</h3>
            <nav>
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="{{ route('admin.perfil') }}" class="breadcrumb">Perfis</a>
                    <a href="" class="breadcrumb">Permissões</a>
                  </div>
                </div>
              </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.perfil.permissao.salvar', $perfil->id) }}" method="POST">
                {{ csrf_field() }}
                <select name="permissao_id">
                    @foreach ($permissao as $p)
                        <option value="{{$p->id}}">{{ Str::upper($p->nome) }}</option>
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
                    @foreach ($perfil->permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->nome }}</td>
                            <td>{{ $permissao->descricao }}</td>
                            <td>
                                <a href="javascript: if(confirm('Deseja realmente remover esse perfil?')){ window.location.href='{{ route('admin.perfil.permissao.remover', [$perfil->id, $permissao->id]) }}' }" class="btn red">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
