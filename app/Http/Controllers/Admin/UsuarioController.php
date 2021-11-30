<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Perfil;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->all();
        $email = $dados['email'];
        $password = $dados['password'];

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            Session::flash('status', [
                'msg'           => 'Login realizado com sucesso!',
                'class'         => 'green white-text'
            ]);

            return redirect(route('admin.principal'));
        }

        Session::flash('status', [
            'msg'           => 'Login ou Senha inválidos!',
            'class'         => 'red white-text'
        ]);
        return redirect(route('admin.logar'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.logar'));
    }

    public function index()
    {
        if(Gate::allows('listar-usuarios', true)){
            dd('autorizado');
        }else {
            dd('não autorizado');
        }
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function adicionar()
    {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $usuario = new User();
        $usuario->name      = $dados['name'];
        $usuario->email     = $dados['email'];
        $usuario->password  = bcrypt($dados['password']);
        $usuario->save();

        $mensagem = [
            'msg'       => 'Usuário registrado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.usuarios'))->with('status', $mensagem);

    }

    public function editar($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = User::find($id);
        $dados   = $request->all();

        if(isset($dados['password'])){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario->update($dados);

        $mensagem = [
            'msg'       => 'Usuário atualizado com sucesso!',
            'class'     => 'green white-text'
        ];

        return redirect(route('admin.usuarios'))->with('status', $mensagem);
    }

    public function deletar($id)
    {
        User::find($id)->delete();

        $mensagem = [
            'msg'       => 'Usuário deletado com sucesso!',
            'class'     => 'green white-text'
        ];


        return redirect(route('admin.usuarios'))->with('status', $mensagem);
    }

    public function perfil($id)
    {
        $usuario    = User::find($id);
        $perfis     = Perfil::all();

        return view('admin.usuarios.perfis', compact('usuario', 'perfis'));
    }

    public function salvarPerfil(Request $request, $id)
    {
        $usuario    = User::find($id);
        $dados      = $request->all();
        $perfil     = Perfil::find($dados['perfil_id']);
        $usuario->adicionaPerfil($perfil);
        return redirect()->back();
    }

    public function removerPerfil($id, $perfil_id)
    {
        $usuario    = User::find($id);
        $perfil     = Perfil::find($perfil_id);
        $usuario->removePerfil($perfil);
        return redirect()->back();
    }
}
