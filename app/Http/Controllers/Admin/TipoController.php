<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{

    public function index()
    {
        $registros = Tipo::all();
        return view('admin.tipos.index', compact('registros'));
    }

    public function adicionar()
    {
        return view("admin.tipos.adicionar");
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];
        $registro->save();

        $mensagem = [
            'msg'       => 'Registro adicionado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.tipos'))->with('status', $mensagem);
    }

    public function editar($id)
    {
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro   = Tipo::find($id);
        $dados      = $request->all();

        $registro->update($dados);

        $mensagem = [
            'msg'       => 'Registro atualizado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.tipos'))->with('status', $mensagem);
    }

    public function deletar($id)
    {
        if(Imovel::where('tipo_id', '=', $id)->count())
        {
            $msg = "Exclusão não autorizada.
                    Os imóveis com Id: ";

            $imoveis = Imovel::where('tipo_id', '=', $id)->get();
            foreach($imoveis as $imovel)
            {
                $msg .= $imovel->id . ", ";
            }

            $msg .= 'estão relacionados com esse Tipo!';

            $mensagem = [
                'msg'       => $msg,
                'class'     => 'red white-text'
            ];

            return redirect(route('admin.tipos'))->with('status', $mensagem);

        }
        Tipo::find($id)->delete();

        $mensagem = [
            'msg'       => 'Registro deletado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.tipos'))->with('status', $mensagem);
    }

}
