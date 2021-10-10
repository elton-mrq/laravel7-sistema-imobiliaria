<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;

class SiteImovelController extends Controller
{
    public function index($id)
    {
        $imovel         = Imovel::find($id);
        $galeria        = $imovel->galeria()->orderBy('ordem')->get();
        $direcaoImagem  = ['center-align', 'left-align', 'right-alig'];
        return view('site.imovel', compact('imovel', 'galeria', 'direcaoImagem'));
    }
}
