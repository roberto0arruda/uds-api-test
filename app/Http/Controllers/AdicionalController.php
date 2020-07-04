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
