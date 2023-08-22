<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecos = [
            [
                "endereco" => 'Quadra B-2',
                "cidade_id" => 170
            ],
            [
                "endereco" => 'Rua Quinze',
                "cidade_id" => 3542
            ],
            [
                "endereco" => 'Rua YY',
                "cidade_id" => 3200
            ],
            [
                "endereco" => 'Rua dos Reis Magos',
                "cidade_id" => 3114
            ],
            [
                "endereco" => 'Rua João Pereira de Carvalho',
                "cidade_id" => 990
            ],
            [
                "endereco" => 'Travessa Avestruz',
                "cidade_id" => 68
            ],
            [
                "endereco" => 'Quadra G',
                "cidade_id" => 883
            ],
            [
                "endereco" => 'Avenida Historiador Raimundo Girão',
                "cidade_id" => 950
            ],
            [
                "endereco" => 'Rua dos Jasmins',
                "cidade_id" => 4754
            ],
            [
                "endereco" => 'Avenida Camapuã',
                "cidade_id" => 112
            ],
            [
                "endereco" => 'Rua Caparari',
                "cidade_id" => 112
            ],
            [
                "endereco" => 'Rua Caterete',
                "cidade_id" => 5123
            ],
            [
                "endereco" => 'Comunidade Jucuruaba',
                "cidade_id" => 3171
            ],
            [
                "endereco" => 'Rua Claudomiro de Moraes, s/n',
                "cidade_id" => 302
            ],
            [
                "endereco" => 'Rua Natal',
                "cidade_id" => 827
            ],
        ];

        foreach ($enderecos as $endereco) {
            Endereco::UpdateOrCreate($endereco, $endereco);
        }
    }
}
