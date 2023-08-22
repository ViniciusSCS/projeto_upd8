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
            [
                "nome" => "Giovana Clara da Conceição",
                "cpf" => "576.643.241-06",
                'endereco_id' => 4,
                "data_nascimento" => "1956-01-25",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Vanessa Louise Barros",
                "cpf" => "442.398.281-12",
                'endereco_id' => 5,
                "data_nascimento" => "2003-01-18",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Rafael Gael Fábio Assunção",
                "cpf" => "006.638.046-47",
                'endereco_id' => 6,
                "data_nascimento" => "1951-02-08",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Marli Andrea Nicole da Luz",
                "cpf" => "843.030.952-73",
                'endereco_id' => 7,
                "data_nascimento" => "1952-06-22",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Rosângela Tânia Drumond",
                "cpf" => "037.036.106-70",
                'endereco_id' => 8,
                "data_nascimento" => "1951-02-05",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Bernardo Alexandre Moura",
                "cpf" => "781.046.353-52",
                'endereco_id' => 9,
                "data_nascimento" => "1992-03-18",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Natália Julia Carolina Lima",
                "cpf" => "085.063.666-31",
                'endereco_id' => 10,
                "data_nascimento" => "1951-03-12",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Laura Rafaela Patrícia Souza",
                "cpf" => "531.402.801-81",
                'endereco_id' => 11,
                "data_nascimento" => "1995-02-23",
                "sexo" => "Feminino"
            ],
            [
                "nome" => "Pietro Nathan Nicolas Lopes",
                "cpf" => "519.274.378-81",
                'endereco_id' => 12,
                "data_nascimento" => "1993-01-08",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Thiago Campos",
                "cpf" => "390.567.472-66",
                'endereco_id' => 13,
                "data_nascimento" => "1998-06-10",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Marcos Brito",
                "cpf" => "199.236.598-95",
                'endereco_id' => 14,
                "data_nascimento" => "1988-07-12",
                "sexo" => "Masculino"
            ],
            [
                "nome" => "Débora Lorena Elza da Rocha",
                "cpf" => "328.001.708-40",
                'endereco_id' => 15,
                "data_nascimento" => "1998-03-27",
                "sexo" => "Feminino"
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::UpdateOrCreate($cliente, $cliente);
        }
    }
}
