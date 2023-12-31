<?php

namespace App\Services;

use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;

class CidadeService
{
    protected $repository;

    public function __construct(CidadeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function selectPorEstado($codigo_uf)
    {
        return $this->repository->selectPorEstado($codigo_uf);
    }
}
