<?php

namespace App\Http\Controllers;

use App\Produto;

class ProdutoController extends Controller
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
        return response()->json(Produto::all(), 200);
    }

    public function getOne($id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return response()->json($produto, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }
}
