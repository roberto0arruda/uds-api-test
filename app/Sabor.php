<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(@OA\Xml(name="Sabor"))
 */
class Sabor extends Model
{
    protected $table = 'sabores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'tempo_preparo'
    ];
}


