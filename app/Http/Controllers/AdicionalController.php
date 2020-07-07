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
     *     @OA\Response(response="200", description="Uma lista com adicionais"),
     * ),
     *
    */
    public function getAll()
    {
        return response()->json(Adicional::all(), 200);
    }

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
