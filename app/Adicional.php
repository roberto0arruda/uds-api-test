<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(@OA\Xml(name="Adicional"))
 */
class Adicional extends Model
{
    protected $table = 'adicionais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'valor',
        'tempo_preparo'
    ];
}


