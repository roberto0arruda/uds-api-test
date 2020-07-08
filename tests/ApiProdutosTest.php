<?php


class ApiProdutosTest extends TestCase
{
    public function testCriarProduto()
    {
        $this->post('/api/produtos', [
            "id" => 10000,
            "nome" => "Produto de teste",
            "descricao" => "Tijela de 300ml",
            "tamanho" => 300,
            "unidade" => "ml",
            "valor" => 10,
            "tempo_preparo" => 5
        ]);

        $this->assertResponseStatus(201);
    }
}
