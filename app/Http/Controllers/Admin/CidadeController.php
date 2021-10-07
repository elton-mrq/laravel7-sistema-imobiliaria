<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cidade;
use App\Imovel;

class CidadeController extends Controller
{
    public function index()
    {
        $registros = Cidade::all();
        return view('admin.cidades.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Cidade();
        $registro->nome     = ucwords($dados['nome']);
        $registro->estado   = ucwords($dados['estado']);
        $registro->sigla_estado   = strtoupper($dados['sigla_estado']);
        $registro->save();

        $mensagem = [
            'msg'       => 'Registro adicionado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.cidades'))->with('status', $mensagem);
    }

    public function editar($id)
    {
        $registro = Cidade::find($id);
        return view('admin.cidades.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados      = $request->all();
        $registro   = Cidade::find($id);

        $registro->update($dados);

        $mensagem = [
            'msg'       => 'Registro atualizado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.cidades'))->with('status', $mensagem);
    }

    public function deletar($id)
    {

        if(Imovel::where('cidade_id', '=', $id)->count())
        {
            $msg = "Exclusão não autorizada.
                    Os imóveis com Id:  ";
            $imoveis = Imovel::where('cidade_id', '=', $id)->get();
            foreach($imoveis as $imovel)
            {
                $msg .= $imovel->id . ", ";
            }
            $msg .= 'estão relacionados com essa Cidade!';

            $mensagem = [
                'msg'       => $msg,
                'class'     => 'red white-text'
            ];

            return redirect(route('admin.cidades'))->with('status', $mensagem);
        }
        Cidade::find($id)->delete();

        $mensagem = [
            'msg'       => 'Registro deletado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.cidades'))->with('status', $mensagem);
    }

}
