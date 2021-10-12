<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permissao;

class Perfil extends Model
{
    protected $table = 'perfis';
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }
}
