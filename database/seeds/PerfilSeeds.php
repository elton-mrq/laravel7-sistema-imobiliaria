<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Perfil::where('nome', '=', 'admin')->count()){
            Perfil::create([
                'nome'          => 'admin',
                'descricao'     => 'Administrador do Sistema'
            ]);
        }

        if(!Perfil::where('nome', '=', 'gerente')->count()){
            Perfil::create([
                'nome'          => 'gerente',
                'descricao'     => 'Gerente do Sistema'
            ]);
        }

        if(!Perfil::where('nome', '=', 'vendedor')->count()){
            Perfil::create([
                'nome'          => 'vendedor',
                'descricao'     => 'Equipe de vendas'
            ]);
        }
    }
}
