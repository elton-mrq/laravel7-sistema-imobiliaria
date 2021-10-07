<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class Galeria extends Model
{
    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id');
    }
}
