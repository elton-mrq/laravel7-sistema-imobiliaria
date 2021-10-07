<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pagina;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoMail;

class PaginaController extends Controller
{
    public function sobre()
    {
        $pagina = Pagina::where('tipo', '=', 'sobre')->first();
        return view('site.sobre', compact('pagina'));
    }

    public function contato()
    {
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email  = $pagina->email;
        Mail::send(new ContatoMail($request, $email));
        /* Mail::send('emails.mailContato', ['request' => $request],
                    function($m) use ($request, $email) {

            $m->from($request['email'], $request['nome']);
            $m->subject('Contato pelo Site');
            $m->to($email, 'Contato do site');

        }); */

        $mensagem = ['msg'       => 'E-mail enviado com sucesso!',
                     'class'     => 'green white-text'];

        return redirect(route('site.contato'))->with('status', $mensagem);
    }
}
