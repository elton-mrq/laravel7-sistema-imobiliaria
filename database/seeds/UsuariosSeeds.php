<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = "Elton Marques";
        $usuario->email = "eltonmrq@gmail.com";
        $usuario->password = bcrypt('1234');
        $usuario->save();
    }
}
