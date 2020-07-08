<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(@OA\Xml(name="Produto"))
 */
class Produto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'tamanho',
        'unidade',
        'valor',
        'tempo_preparo'
    ];
}


