<?php

namespace App\Http\Controllers;



use App\Sabor;

class SaborController extends Controller
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
     *     tags={"sabores"},
     *     summary="Retorna uma lista de sabores",
     *     description="Retorna um objeto de sabores",
     *     path="/api/sabores",
     *     @OA\Response(response="200", description="Uma lista com sabores"),
     * ),
     *
    */
    public function getAll()
    {
        return response()->json(Sabor::all(), 200);
    }

    /**
     * @OA\Get(
     *      tags={"sabores"},
     *      summary="Encontra um sabor pelo id",
     *      description="Retorna um objeto de sabor",
     *      path="/api/sabores/{id}",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID do sabor para retorno",
     *          required=true,
     *      ),
     *      @OA\Response(response="200", description="sabor encontrado"),
     *      @OA\Response(
     *         response=404,
     *         description="Sabor não encontrado"
     *     ),
     * )
     *
     * @param int $id
    */
    public function getOne($id)
    {
        $sabor = Sabor::find($id);

        if ($sabor) {
            return response()->json($sabor, 200);
        } else {
            return response()->json(['message' => 'sabor não encontrado'], 404);
        }
    }
}
