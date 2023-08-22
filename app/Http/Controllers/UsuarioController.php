<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $service;

    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function user(Request $request)
    {
        $user = $this->service->user($request);

        return ['status' => true, "usuario" => $user];
    }

    public function create(UsuarioRequest $request)
    {
        $data = $request->all();

        $user = $this->service->create($data);

        return ['status' => true, "messages" => 'Usuário cadastrado com sucesso', "usuario" => $user];
    }
}
