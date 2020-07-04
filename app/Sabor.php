<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


