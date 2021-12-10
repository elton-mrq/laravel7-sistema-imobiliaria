<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Permissao::where('nome', '=', 'usuario_listar')->count()){
            Permissao::create([
                'nome'          => 'usuario_listar',
                'descricao'     => 'Listar usuários'
            ]);
        }else {
            $permissao = Permissao::where('nome', '=', 'usuario_listar')->first();
            $permissao->update([
                'nome'          => 'usuario_listar',
                'descricao'     => 'Listar usuários'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_adicionar')->count()){
            Permissao::create([
                'nome'          => 'usuario_adicionar',
                'descricao'     => 'Adicionar usuários'
            ]);
        }else {
            $permissao = Permissao::where('nome', '=', 'usuario_adicionar')->first();
            $permissao->update([
                'nome'          => 'usuario_adicionar',
                'descricao'     => 'Adicionar usuários'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_editar')->count()){
            Permissao::create([
                'nome'          => 'usuario_editar',
                'descricao'     => 'Editar usuários'
            ]);
        }else {
            $permissao = Permissao::where('nome', '=', 'usuario_editar')->first();
            $permissao->update([
                'nome'          => 'usuario_editar',
                'descricao'     => 'Editar usuários'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_deletar')->count()){
            Permissao::create([
                'nome'          => 'usuario_deletar',
                'descricao'     => 'Deletar usuários'
            ]);
        }else {
            $permissao = Permissao::where('nome', '=', 'usuario_deletar')->first();
            $permissao->update([
                'nome'          => 'usuario_deletar',
                'descricao'     => 'Deletar usuários'
            ]);
        }

        if(!Permissao::where('nome', '=', 'perfil_listar')->count()){
            Permissao::create([
                'nome'          => 'perfil_listar',
                'descricao'     => 'Listar perfis cadastrados'
            ]);
        }else{
            $permissao = Permissao::where('nome', '=', 'perfil_listar')->first();
            $permissao->update([
                'nome'          => 'perfil_listar',
                'descricao'     => 'Listar perfis cadastrados'
            ]);
        }

        if(!Permissao::where('nome', '=', 'perfil_adicionar')->count()){
            Permissao::create([
                'nome'          => 'perfil_adicionar',
                'descricao'     => 'Adicionar perfis'
            ]);
        }else {
            $permissao = Permissao::where('nome', '=', 'perfil_adicionar')->first();
            $permissao->update([
                'nome'          => 'perfil_adicionar',
                'descricao'     => 'Adicionar perfis'
            ]);
        }

        if(!Permissao::where('perfil_editar', '=', 'perfil_editar')->count()){
            Permissao::create([
                'nome'          => 'perfil_editar',
                'descricao'     => 'Editar perfis'
            ]);
        } else{
            $permissao = Permissao::where('nome', '=', 'perfil_editar')->first();
            $permissao->update([
                'nome'          => 'perfil_editar',
                'descricao'     => 'Editar perfis'
            ]);
        }

        if(!Permissao::where('nome', '=', 'perfil_deletar')->count()){
            Permissao::create([
                'nome'          => 'perfil_deletar',
                'descricao'     => 'Deletar perfis'
            ]);
        } else{
            $permissao = Permissao::where('nome', '=', 'perfil_deletar')->first();
            $permissao->update([
                'nome'          => 'perfil_deletar',
                'descricao'     => 'Deletar perfis'
            ]);
        }
    }
}
