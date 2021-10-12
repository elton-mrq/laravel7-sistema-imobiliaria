<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perfil;

class Permissao extends Model
{
    protected $table = 'permissoes';
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function perfis()
    {
       return $this->belongsToMany(Perfil::class);
    }
}
