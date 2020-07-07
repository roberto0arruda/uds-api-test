<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

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

    /**
     * @OA\Get(
     *     tags={"pedidos"},
     *     summary="Retorna uma lista de pedidos",
     *     description="Retorna um objeto de pedidos",
     *     path="/api/pedidos",
     *     @OA\Response(response="200", description="Uma lista com pedidos"),
     * ),
     *
    */
    public function getAll()
    {
        return response()->json(Pedido::with('produto', 'sabor')->get(), 200);
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

    public function create(Request $request)
    {
        $this->validate($request, [
            'produto_id' => 'required',
            'sabor_id' => 'required',
            'valor_total' => 'required|integer',
            'tempo_preparo' => 'required|integer'
        ]);

        $pedido = Pedido::create($request->all());

        return response()->json($pedido, 201);
    }
}
