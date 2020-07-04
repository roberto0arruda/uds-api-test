<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descicao',
        'tamanho',
        'unidade',
        'valor',
        'tempo_preparo'
    ];
}


