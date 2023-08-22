<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                "nome" => "Martin Gustavo Márcio Aparício",
                "cpf" => "042.665.515-09",
                'endereco_id' => 1,
                "data_nascimento" => "1994-05-15",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Heloisa Emilly Priscila Corte Real",
                "cpf" => "636.106.757-21",
                'endereco_id' => 2,
                "data_nascimento" => "1994-04-18",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Noah Márcio da Silva",
                "cpf" => "966.625.504-93",
                'endereco_id' => 3,
                "data_nascimento" => "1989-04-20",
                "sexo" => "Masculino"
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::UpdateOrCreate($cliente, $cliente);
        }
    }
}
