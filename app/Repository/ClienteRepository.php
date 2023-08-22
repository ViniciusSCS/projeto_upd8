<?php

namespace App\Repository;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository
{
    public function find($clienteId)
    {
        $query = $this->selectQuery();
        return $query
            ->find($clienteId);
    }

    public function create($data, $enderecoId)
    {
        return Cliente::create([
            'nome' => $data['nome'],
            'cpf' => $data['cpf'],
            'sexo' => $data['sexo'],
            'endereco_id' => $enderecoId,
            'data_nascimento' => $data['data_nascimento'],
        ]);
    }

    public function list()
    {
        $query = $this->selectQuery();

        return $query
            ->paginate(10);
    }

    public function search($request)
    {
        $query = $this->selectQuery();

        $query = $this->searchQuery($request, $query);

        return $query
            ->paginate(10);
    }

    public function delete($clienteId)
    {
        $cliente = $this->find($clienteId);

        $cliente->delete();

        return $cliente;
    }

    private function selectQuery()
    {
        return Cliente::select(
            '*',
            DB::raw("date_format(data_nascimento, '%d/%m/%Y') as data_nascimento"),
        )
            ->with('endereco')
            ->with('endereco.cidade')
            ->with('endereco.cidade.estado');
    }

    private function searchQuery($request, $query)
    {
        if ($request->has('cpf')) {
            $query->where('cpf', 'LIKE', '%' . $request->cpf . '%');
        }

        if ($request->has('nome')) {
            $query->where('nome', 'LIKE', '%' . $request->nome . '%');
        }

        if ($request->has('data_nascimento')) {
            $query->where('data_nascimento', $request->data_nascimento);
        }

        if ($request->has('sexo')) {
            $query->where('sexo', $request->sexo);
        }

        if ($request->has('estado')) {
            $query->whereHas('endereco.cidade.estado', function ($query) use ($request) {
                $query->where('nome', 'LIKE',  '%' . $request->estado . '%');
            });
        }

        if ($request->has('cidade')) {
            $query->whereHas('endereco.cidade', function ($query) use ($request) {
                $query->where('nome', 'LIKE',  '%' . $request->cidade . '%');
            });
        }

        return $query;
    }
}
