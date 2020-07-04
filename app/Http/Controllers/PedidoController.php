<?php

namespace App\Http\Controllers;

use App\Pedido;

class PedidoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAll()
    {
        return response()->json(Pedido::all(), 200);
    }

    public function getOne($id)
    {
        $pedido = Pedido::find($id);

        if ($pedido) {
            return response()->json($pedido, 200);
        } else {
            return response()->json(['message' => 'pedido não encontrado'], 404);
        }
    }
}
