<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;
use App\Cidade;
use App\Galeria;

class Imovel extends Model
{
    protected $table = 'imoveis';

    protected $fillable = [
        'titulo', 'descricao', 'status', 'tipo_id',
        'cep', 'cidade_id', 'valor', 'dormitorios',
        'detalhes', 'mapa', 'publicar', 'imagem',
        'visualizacoes'
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function galeria()
    {
        return $this->hasMany(Galeria::class, 'imovel_id');
    }
}
