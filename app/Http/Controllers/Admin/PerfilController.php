<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perfil;
use App\Permissao;

class PerfilController extends Controller
{
    public function index()
    {
        $registros = Perfil::all();
        return view('admin.perfis.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.perfis.adicionar');
    }

    public function salvar(Request $request)
    {
        Perfil::create($request->all());

        $mensagem = [
            'msg'         => 'Registro adicionado com sucesso!',
            'class'       => 'green white-text'
        ];

        return redirect(route('admin.perfil'))->with('status', $mensagem);
    }

    public function editar($id)
    {
        if(Perfil::find($id)->nome == 'admin'){
            $mensagem = [
                'msg'           => 'Não é possível editar o perfil de administrador!',
                'class'         => 'red white-text'
            ];
            return redirect(route('admin.perfil'))->with('status', $mensagem);
        }

        $registro = Perfil::find($id);
        return view('admin.perfis.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        if(Perfil::find($id)->nome == 'admin'){
            $mensagem = [
                'msg'           => 'Não é possível editar o perfil de administrador!',
                'class'         => 'red white-text'
            ];
            return redirect(route('admin.perfil'))->with('status', $mensagem);
        }

        Perfil::find($id)->update($request->all());

        $mensagem = [
            'msg'           => 'Registro atualizado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.perfil'))->with('status', $mensagem);
    }

    public function deletar($id)
    {
        if(Perfil::find($id)->nome == 'admin'){
            $mensagem = [
                'msg'           => 'Não é possível excluir o perfil de administrador!',
                'class'         => 'red white-text'
            ];

            return redirect(route('admin.perfil'))->with('status', $mensagem);
        }

        Perfil::find($id)->delete();

        $mensagem = [
            'msg'           => 'Registro deletado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.perfil'))->with('status', $mensagem);
    }

    public function permissao($id)
    {
        $perfil          = Perfil::find($id);
        $permissao       = Permissao::all();

        return view('admin.perfis.permissao', compact('perfil', 'permissao'));
    }

    public function salvarPermissao(Request $request, $id)
    {
        $perfil         = Perfil::find($id);
        $permissao      = Permissao::find($request['permissao_id']);
        $perfil->adicionarPermissao($permissao);
        return redirect()->back();
    }

    public function removerPermissao($id, $id_permissao)
    {
        $perfil         = Perfil::find($id);
        $permissao      = Permissao::find($id_permissao);
        $perfil->removerPermissao($permissao);
        return redirect()->back();
    }
}
