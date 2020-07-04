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

    public function getAll()
    {
        return response()->json(Sabor::all(), 200);
    }

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
