<?php

namespace App\Services;

use App\Repository\ClienteRepository;
use App\Repository\EnderecoRepository;

class ClienteService
{
    protected $repository, $endRepository;

    public function __construct(ClienteRepository $repository, EnderecoRepository $endRepository)
    {
        $this->repository = $repository;
        $this->endRepository = $endRepository;
    }

    public function create($request, $enderecoId)
    {
        $data = $request->all();

        return $this->repository->create($data, $enderecoId);
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function edit($clienteId)
    {
        return $this->repository->find($clienteId);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $cliente = $this->repository->find($id);

        $cliente->update($data);

        return $cliente;
    }

    public function search($request)
    {
        return $this->repository->search($request);
    }

    public function delete($clienteId)
    {
        $cliente = $this->repository->find($clienteId);

        if ($cliente == null) {
            return null;
        }

        $endereco = $this->endRepository->find($cliente['endereco']['id']);

        $cliente = $this->repository->delete($clienteId);

        $endereco = $this->endRepository->delete($endereco->id);

        return $cliente;
    }
}
