<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

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

    /**
     * @OA\Get(
     *     tags={"produtos"},
     *     summary="Retorna uma lista de produtos",
     *     description="Retorna um objeto de produtos",
     *     path="/api/produtos",
     *     @OA\Response(response="200", description="Uma lista com produtos"),
     * ),
    */
    public function getAll()
    {
        return response()->json(Produto::all(), 200);
    }

    /**
     * @OA\Get(
     *      tags={"produtos"},
     *      summary="Encontra um produto pelo id",
     *      description="Retorna um objeto de produto",
     *      path="/api/produtos/{id}",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID do produto para retorno",
     *          required=true,
     *      ),
     *      @OA\Response(response="200", description="produto encontrado"),
     *      @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     ),
     * )
     *
     * @param int $id
    */
    public function getOne($id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return response()->json($produto, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
            'unidade' => 'required',
            'tamanho' => 'required|integer',
            'valor' => 'required|integer',
            'tempo_preparo' => 'required|integer'
        ]);

        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    public function update($id, Request $request)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return response()->json($produto, 200);
    }

    public function delete($id)
    {
        try {
            Produto::findOrFail($id)->delete();
            return response('Deleted Successfully', 200);
        } catch (\Exception $e) {
            return response('Not Found', 404);
        }
    }
}
