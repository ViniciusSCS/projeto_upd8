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
        ];

        foreach ($enderecos as $endereco) {
            Endereco::UpdateOrCreate($endereco, $endereco);
        }
    }
}
