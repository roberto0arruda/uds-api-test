<?php

use App\Produto;
use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                "nome" => "Açaí Pequeno",
                "descricao" => "Tijela de 300ml",
                "tamanho" => 300,
                "unidade" => "ml",
                "valor" => 10,
                "tempo_preparo" => 5
            ],
            [
                "nome" => "Açaí Médio",
                "descricao" => "Tijela de 500ml",
                "tamanho" => 300,
                "unidade" => "ml",
                "valor" => 13,
                "tempo_preparo" => 7
            ],
            [
                "nome" => "Açaí Grande",
                "descricao" => "Tijela de 700ml",
                "tamanho" => 700,
                "unidade" => "ml",
                "valor" => 15,
                "tempo_preparo" => 10
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
