<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imovel;
use App\Tipo;
use App\Cidade;

class ImovelController extends Controller
{

    public function index()
    {
        $registros = Imovel::all();
        return view('admin.imoveis.index', compact('registros'));
    }

    public function adicionar()
    {
        $tipos = Tipo::all();
        $cidades = Cidade::all();
        return view('admin.imoveis.adicionar', compact('tipos', 'cidades'));
    }

    public function salvar(Request $request)
    {
        $dados  = $request->all();

        $dados['visualizacoes'] = 0;

        if(!isset($dados['mapa']) || $dados['mapa'] == ""){
            $dados['mapa'] == null;
        }else{
            trim($dados['mapa']);
        }

        $file       = $request->file('imagem');
        if($file){
            $rand               = rand(11111, 99999);
            $dir                = 'img/imoveis/' . Str::slug($dados['titulo'], '_') ."/";
            $ext                = $file->guessClientExtension();
            $nomeArquivo        = '_img_' . $rand . '.' . $ext;
            $file->move($dir, $nomeArquivo);
            $dados['imagem']    = $dir . $nomeArquivo;
        }
        //dd($dados);
        Imovel::create($dados);

        $mensagem = [
            'msg'       => 'Registro adicionado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.imoveis'))->with('status', $mensagem);
    }

    public function editar($id)
    {
        $tipos      = Tipo::all();
        $cidades    = Cidade::all();

        $registro   = Imovel::find($id);

        return view('admin.imoveis.editar', compact('tipos', 'cidades', 'registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados      = $request->all();
        $registro   = Imovel::find($id);

        if(!isset($dados['mapa']) || $dados['mapa'] == ''){
            $dados['mapa'] = null;
        }else{
            trim($dados['mapa']);
        }

        $file = $request->file('imagem');
        if($file){
            $rand           = rand(11111,99999);
            $dir            = 'img/imoveis/' . Str::slug($dados['titulo'], '_') . '/';
            $ext            = $file->guessClientExtension();
            $nomeArquivo    = '_img_' . $rand . '.' . $ext;
            $file->move($dir, $nomeArquivo);
            $dados['imagem'] = $dir . $nomeArquivo;
        }

        $registro->update($dados);

        $mensagem = [
            'msg'           => 'Registro atualizado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.imoveis'))->with('status', $mensagem);

    }

    public function deletar($id)
    {
        Imovel::find($id)->delete();

        $mensagem = [
            'msg'           => 'Registro deletado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.imoveis'))->with('status', $mensagem);
    }

}
