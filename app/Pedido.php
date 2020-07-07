<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id',
        'sabor_id',
        'adicionais',
        'valor_total',
        'tempo_preparo'
    ];

    protected $casts = [
        'adicionais' => 'array',
        'created_at' => 'datetime:d-m-Y h:m:s'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function sabor()
    {
        return $this->belongsTo(Sabor::class);
    }
}
