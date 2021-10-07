<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if($existe){
            $paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();
        }else{
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo        = 'A Empresa.';
        $paginaSobre->descricao     = 'Descrição da empresa.';
        $paginaSobre->texto         = 'Texto sobre a empresa.';
        $paginaSobre->imagem        = 'img/modelo_img_home.jpg';
        $paginaSobre->mapa          = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.78908011713!2d-48.57910438583085!3d-20.555809086256428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bb852259e4a6c9%3A0x73f6fcd1b97367d8!2sR.%20Trinta%2C%20564%20-%20Centro%2C%20Barretos%20-%20SP%2C%2014780-120!5e0!3m2!1spt-BR!2sbr!4v1627437030350!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        $paginaSobre->tipo          = 'sobre';

        $paginaSobre->save();

        echo 'Pagina Sobre criada com sucesso  ';

        $existe = Pagina::where('tipo', '=', 'contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo', '=', 'contato')->first();
        }else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo        = 'Entre em contato.';
        $paginaContato->descricao     = 'Preencha o formulário';
        $paginaContato->texto         = 'Contato';
        $paginaContato->imagem        = 'img/modelo_img_home.jpg';
        $paginaContato->email        = 'eltonmrq@gmail.com';
        $paginaContato->tipo          = 'contato';

        $paginaContato->save();

        echo ' Pagina Contato criada com sucesso  ';
    }
}
