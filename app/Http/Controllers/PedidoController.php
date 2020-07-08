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

     /**
     * @OA\Get(path="/api/pedidos/{id}",
     *   tags={"pedidos"},
     *   summary="Encontra um pedido pelo seu id",
     *   description="Para uma resposta válida, tente IDs inteiros com os valores> = 1 e <= 10. Outros valores gerarão exceções",
     *   operationId="getOne",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID do pedido que precisa ser buscado",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         format="int64",
     *         minimum=1.0,
     *         maximum=10.0
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="operação bem sucedida",
     *     @OA\Schema(ref="#/components/schemas/Pedido")
     *   ),
     *   @OA\Response(response=400, description="ID inválido fornecido"),
     *   @OA\Response(response=404, description="Pedido não encontrado")
     * )
     */
    public function getOne($id)
    {
        $pedido = Pedido::find($id);

        if ($pedido) {
            return response()->json($pedido, 200);
        } else {
            return response()->json(['message' => 'pedido não encontrado'], 404);
        }
    }

    /**
     * @OA\Post(path="/api/pedidos",
     *   tags={"pedidos"},
     *   summary="Armazena um novo pedido no Banco de Dados",
     *   description="",
     *   operationId="createPedidos",
     *   @OA\RequestBody(
     *       required=true,
     *       description="pedido feito para a compra do açai",
     *       @OA\JsonContent(ref="#/components/schemas/Pedido")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(ref="#/components/schemas/Pedido")
     *   ),
     *   @OA\Response(response=400, description="Invalid Pedido")
     * )
     */
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
