<?php

namespace App\Http\Controllers;

use App\Adicional;

class AdicionalController extends Controller
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
     *     tags={"adicionais"},
     *     summary="Retorna uma lista de adicionais",
     *     description="Retorna um objeto de adicionais",
     *     path="/api/adicionais",
     *     operationId="getAllAdicionais",
     *     @OA\Response(response="200", description="Uma lista com adicionais"),
     * ),
     *
    */
    public function getAll()
    {
        return response()->json(Adicional::all(), 200);
    }

    /**
     * @OA\Get(path="/api/adicionais/{id}",
     *   tags={"adicionais"},
     *   summary="Encontra um adicional pelo seu id",
     *   description="Para uma resposta válida, tente IDs inteiros com os valores> = 1 e <= 10. Outros valores gerarão exceções",
     *   operationId="getOne",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID do adicional que precisa ser buscado",
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
     *     @OA\Schema(ref="#/components/schemas/Adicionail")
     *   ),
     *   @OA\Response(response=400, description="ID inválido fornecido"),
     *   @OA\Response(response=404, description="Adicionail não encontrado")
     * )
     */
    public function getOne($id)
    {
        $adicional = Adicional::find($id);

        if ($adicional) {
            return response()->json($adicional, 200);
        } else {
            return response()->json(['message' => 'adicional não encontrado'], 404);
        }
    }
}
