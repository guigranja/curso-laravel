<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

//    Criando relação entre Temporada e Serie. Onde "temporada" pertence a uma "serie"
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

//    Criando relação entre Temporada e Episodios. Onde uma temporada tem varios episodios
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
}
