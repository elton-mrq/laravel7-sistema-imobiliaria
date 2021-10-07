<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class Tipo extends Model
{
    protected $fillable = [
        'titulo'
    ];

    public function imoveis()
    {
        return $this->hasMany('App\Imovel', 'tipo_id');
    }
}
