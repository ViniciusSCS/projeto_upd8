<?php

namespace App\Repository;

use App\Models\Endereco;

class EnderecoRepository
{
    public function find($id)
    {
        return Endereco::find($id);
    }

    public function create($data)
    {
        return Endereco::create([
            'endereco' => $data['endereco']['endereco'],
            'cidade_id' => $data['endereco']['cidade']
        ]);
    }

    public function delete($enderecoId)
    {
        $endereco = $this->find($enderecoId);

        $endereco->delete();

        return $endereco;
    }
}
