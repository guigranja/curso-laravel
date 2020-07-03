<?php

namespace App;

// Eloquent é um ORM
use Illuminate\Database\Eloquent\Model;

// Camada de acesso ao banco de dados
class Serie extends Model
{
    public $timestamps = false;
//    usamos "fillable" para dizer quais atributos eu permito ser enviado para o banco
    protected $fillable = ['nome'];

//    Criando a relação de Serie com Temporada. Onde uma Serie tem varias Temporadas
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
