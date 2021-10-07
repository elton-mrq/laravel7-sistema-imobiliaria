<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Galeria;
use App\Imovel;

class GaleriaController extends Controller
{
    public function index($imovel_id)
    {
       $imovel = Imovel::find($imovel_id);

       $registros = $imovel->galeria()->orderBy('ordem')->get();
       return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    public function adicionar($imovel_id)
    {
        $imovel = Imovel::find($imovel_id);

        return view('admin.galerias.adicionar', compact('imovel'));

    }

    public function salvar(Request $request, $imovel_id)
    {
        $imovel = Imovel::find($imovel_id);

        if($imovel->galeria()->count()){
            $galeria = $imovel->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        }else{
            $ordemAtual = 0;
        }

        if($request->hasFile('imagens')){
            $imagens = $request->file('imagens');

            foreach($imagens as $file){
                $registro               = new Galeria();
                $rand                   = rand(11111, 99999);
                $dir                    = 'img/imoveis/' . Str::slug($imovel->titulo, '_') ."/";
                $ext                    = $file->guessClientExtension();
                $nomeArquivo            = '_img_' . $rand . '.' . $ext;
                $file->move($dir, $nomeArquivo);
                $registro->imagem       = $dir . $nomeArquivo;
                $registro->imovel_id    = $imovel->id;
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->save();
            }
        }

        $mensagem = [
            'msg'           => 'Registros adicionados com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.galerias', $imovel->id))->with('status', $mensagem);
    }

    public function editar($id)
    {
        $registro       = Galeria::find($id);
        $imovel         = $registro->imovel;

        return view('admin.galerias.editar', compact('registro', 'imovel'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro       = Galeria::find($id);
        $imovel         = $registro->imovel;
        $dados          = $request->all();

        $registro->titulo       = $dados['titulo'];
        $registro->descricao    = $dados['descricao'];
        $registro->ordem        = $dados['ordem'];

        $file = $request->file('imagem');
        if($file){
            $rand           = rand(11111,99999);
            $dir            = 'img/imoveis/' . Str::slug($imovel->titulo, '_') . '/';
            $ext            = $file->guessClientExtension();
            $nomeArquivo    = '_img_' . $rand . '.' . $ext;
            $file->move($dir, $nomeArquivo);
            $registro->imagem = $dir . $nomeArquivo;
        }

        $registro->update();

        $mensagem  = [
            'msg'           => 'Registro alterado com sucesso',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.galerias', $imovel->id))->with('status', $mensagem);
    }

    public function deletar($id)
    {
        $galeria        = Galeria::find($id);
        $imovel         = $galeria->imovel;

        $galeria->delete();

        $mensagem = [
            'msg'           => 'Registro deletado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.galerias', $imovel->id))->with('status', $mensagem);
    }
}
