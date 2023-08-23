<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\ClienteRequest;
use App\Services\{
    ClienteService,
    EnderecoService
};
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $service, $endService;

    public function __construct(ClienteService $service, EnderecoService $endService)
    {
        $this->service = $service;
        $this->endService = $endService;
    }

    public function create(ClienteRequest $request)
    {
        $endereco = $this->endService->create($request);
        $cliente = $this->service->create($request, $endereco['id']);

        return ['status' => true, "messages" => Geral::CLIENTE_CADASTRADO, "cliente" => $cliente];
    }

    public function list()
    {
        $cliente = $this->service->list();

        return ['status' => true, "messages" => Geral::CLIENTE_ENCONTRADOS, "clientes" => $cliente];
    }

    public function edit($id)
    {
        $cliente = $this->service->edit($id);

        $info = ($cliente == NULL ?
            ['status' => false, 'message' => Geral::CLIENTE_NAO_ENCONTRADO] :
            ['status' => true, 'message' => Geral::CLIENTE_ENCONTRADO, "cliente" => $cliente]
        );

        return $info;
    }

    public function update(ClienteRequest $request, $id)
    {
        $endereco = $this->endService->update($request['endereco']);
        $cliente = $this->service->update($request, $id);

        return ['status' => true, 'message' => Geral::CLIENTE_ATUALIZADO, "cliente" => $cliente];
    }

    public function show($id)
    {
        return $this->edit($id);
    }

    public function search(Request $request)
    {
        $cliente = $this->service->search($request);

        return ['status' => true, "messages" => Geral::CLIENTE_ENCONTRADOS, "clientes" => $cliente];
    }

    public function destroy($id)
    {
        $cliente = $this->service->delete($id);

        $info = ($cliente == NULL ?
            ['status' => false, 'message' => Geral::CLIENTE_NAO_ENCONTRADO] :
            ['status' => true, 'message' => Geral::CLIENTE_DELETADO]
        );

        return $info;
    }
}
