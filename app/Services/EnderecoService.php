<?php

namespace App\Services;

use App\Repository\EnderecoRepository;

class EnderecoService
{
    protected $repository;

    public function __construct(EnderecoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        return $this->repository->create($request);
    }

    public function update($request)
    {
        $endereco = $this->repository->find($request['id']);

        $endereco->update($request);

        return $endereco;
    }
}
