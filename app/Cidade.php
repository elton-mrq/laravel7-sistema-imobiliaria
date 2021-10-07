<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class Cidade extends Model
{
    protected $fillable = [
        'nome', 'estado', 'sigla_estado'
    ];

    public function imoveis()
    {
        return $this->hasMany('Imovel', 'cidade_id');
    }
}
