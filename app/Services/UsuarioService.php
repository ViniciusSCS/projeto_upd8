<?php

namespace App\Services;

use App\Repository\UsuarioRepository;

class UsuarioService
{
    protected $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create($data)
    {
        $user = $this->repository->create($data);

        $userFind = $this->find($user->id);

        $token = $userFind->createToken('JWT')->plainTextToken;

        return $user;
    }

    public function user($request)
    {
        $user = $request->user();

        $query = $this->repository->me($user->id);

        return $query;
    }

    public function client()
    {
        return $this->repository->client();
    }
}
