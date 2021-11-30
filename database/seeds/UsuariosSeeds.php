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
        if(!User::where('email', '=', 'eltonmrq@gmail.com')->count()){
            $usuario = new User();
            $usuario->name = "Elton Marques";
            $usuario->email = "eltonmrq@gmail.com";
            $usuario->password = bcrypt('1234');
            $usuario->save();
        }else {
            $usuario = User::where('email', '=', 'eltonmrq@gmail.com')->first();
            $usuario->name = "Elton Marques";
            $usuario->email = "eltonmrq@gmail.com";
            $usuario->password = bcrypt('1234');
            $usuario->update();
        }

    }
}
