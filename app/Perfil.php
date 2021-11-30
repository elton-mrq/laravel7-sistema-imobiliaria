<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permissao;

class Perfil extends Model
{
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function adicionarPermissao($permissao)
    {
        return $this->permissoes()->save($permissao);
    }

    public function removerPermissao($permissao)
    {
        return $this->permissoes()->detach($permissao);
    }
}
