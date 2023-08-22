<?php

namespace App\Services;

use App\Repository\EstadoRepository;

class EstadoService
{
    protected $repository;

    public function __construct(EstadoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function select()
    {
    }
}
