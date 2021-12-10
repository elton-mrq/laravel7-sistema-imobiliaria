<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Imovel;

class SiteImovelController extends Controller
{
    public function index($id)
    {
        $imovel         = Imovel::find($id);
        $galeria        = $imovel->galeria()->orderBy('ordem')->get();
        $direcaoImagem  = ['center-align', 'left-align', 'right-alig'];
        $seo            = [
                            'titulo'        => $imovel->titulo,
                            'descricao'     => $imovel->descricao,
                            'imagem'        => asset($imovel->imagem),
                            'url'           => route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')])
                        ];
        return view('site.imovel', compact('imovel', 'galeria', 'direcaoImagem', 'seo'));

    }
}
