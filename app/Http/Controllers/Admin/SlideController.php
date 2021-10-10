<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {
        $registros = Slide::all();
        return view('admin.slides.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.slides.adicionar');
    }

    public function salvar(Request $request)
    {
        if(Slide::count()){
            $slide = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slide->ordem;
        }else{
            $ordemAtual = 0;
        }

        if($request->hasFile('imagens')){
            $imagens = $request->file('imagens');

            foreach($imagens as $imagem){
                $registro       = new Slide();
                $rand           = rand(11111,999999);
                $dir            = 'img/slides/';
                $ext            = $imagem->guessClientExtension();
                $nomeArquivo    = '_img_' . $rand . '.' . $ext;
                $imagem->move($dir, $nomeArquivo);
                $registro->imagem = $dir . $nomeArquivo;
                $registro->ordem  = $ordemAtual + 1;
                $ordemAtual++;
                $registro->save();
            }
        }

        $mensagem = [
            'msg'           => 'Registro adicionado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.slides'))->with('status', $mensagem);
    }

    public function editar($id)
    {
        $registro = Slide::find($id);
        return view('admin.slides.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro   = Slide::find($id);
        $dados      = $request->all();

        $registro->titulo       = $dados['titulo'];
        $registro->descricao    = $dados['descricao'];
        $registro->link         = $dados['link'];
        $registro->ordem        = $dados['ordem'];
        $registro->publicado    = $dados['publicado'];

        $file = $request->file('imagem');
        if($file){
            $rand           = rand(11111,99999);
            $dir            = 'img/slides/';
            $ext            = $file->guessClientExtension();
            $nomeArquivo    = '_img_' . $rand . '.' . $ext;
            $file->move($dir, $nomeArquivo);
            $registro->imagem = $dir . $nomeArquivo;
        }

        $registro->update();

        $mensagem = [
            'msg'           => 'Registro alterado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.slides'))->with('status', $mensagem);
    }

    public function deletar($id)
    {
        $slide  = Slide::find($id);
        $slide->delete();

        $mensagem = [
            'msg'           => 'Registro deletado com sucesso!',
            'class'         => 'green white-text'
        ];

        return redirect(route('admin.slides'))->with('status', $mensagem);

    }
}
