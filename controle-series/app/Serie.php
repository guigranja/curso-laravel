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
}
