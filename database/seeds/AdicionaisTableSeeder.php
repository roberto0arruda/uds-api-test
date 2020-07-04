<?php

use App\Adicional;
use Illuminate\Database\Seeder;

class AdicionaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adicionais = [
            [
                "nome" => "Granola"
            ],
            [
                "nome" => "Leite Ninho",
                "valor" => 3
            ],
            [
                "nome" => "Paçoca",
                "valor" => 3,
                "tempo_preparo" => 3
            ]
        ];

        foreach ($adicionais as $adicional) {
            Adicional::create($adicional);
        }
    }
}
