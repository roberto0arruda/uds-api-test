<?php

use App\Sabor;
use Illuminate\Database\Seeder;

class SaboresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sabores = [
            [
                "nome" => "Morango"
            ],
            [
                "nome" => "Banana"
            ],
            [
                "nome" => "Kiwi",
                "tempo_preparo" => 5
            ]
        ];

        foreach ($sabores as $sabor) {
            Sabor::create($sabor);
        }
    }
}
