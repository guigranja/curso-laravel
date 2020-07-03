<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

//    Criando relação entre Episodio e Temporada. Onde episodio pertence a uma temporada
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
