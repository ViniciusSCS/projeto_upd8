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

    /**
     * @OA\Post(
     *     tags={"Cliente"},
     *     path="/cliente/cadastro",
     *     @OA\Parameter(
     *         name="nome",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="cpf",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="sexo",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="data_nascimento",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="edereco",
     *         required=false,
     *     ),
     *     @OA\Response(response="200", description="Cadastra as informações do Cliente"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     *     @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function create(ClienteRequest $request)
    {
        $endereco = $this->endService->create($request);
        $cliente = $this->service->create($request, $endereco['id']);

        return ['status' => true, "messages" => Geral::CLIENTE_CADASTRADO, "cliente" => $cliente];
    }

    /**
     * @OA\Get(
     *     tags={"Cliente"},
     *     path="/cliente/listar",
     *     @OA\Response(response="200", description="Lista os Clientes cadastrados"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
    public function list()
    {
        $cliente = $this->service->list();

        return ['status' => true, "messages" => Geral::CLIENTE_ENCONTRADOS, "clientes" => $cliente];
    }

    /**
     * @OA\Get(
     *     tags={"Cliente"},
     *     path="/cliente/editar/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         description="Cliete id",
     *         in="/editar/{id}",
     *         required=true,
     *         @OA\Schema(
     *              type="integer",
     *              format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Apresenta a informação do Cliente selecionado para edição"),
     *     @OA\Response(response="204", description="Cliente não encotrado"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
    public function edit($id)
    {
        $cliente = $this->service->edit($id);

        $info = ($cliente == NULL ?
            ['status' => false, 'message' => Geral::CLIENTE_NAO_ENCONTRADO] :
            ['status' => true, 'message' => Geral::CLIENTE_ENCONTRADO, "cliente" => $cliente]
        );

        return $info;
    }

    /**
     * @OA\Get(
     *     tags={"Cliente"},
     *     path="/cliente/visualizar/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         description="Cliete id",
     *         in="/visualizar/{id}",
     *         required=true,
     *         @OA\Schema(
     *              type="integer",
     *              format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Apresenta a informação do Cliente selecionado para visualização"),
     *     @OA\Response(response="204", description="Cliente não encotrado"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * @OA\Get(
     *     tags={"Cliente"},
     *     path="/cliente/buscar?",
     *     @OA\Parameter(
     *         name="nome",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="cpf",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="sexo",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="data_nascimento",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="estado",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="cidade",
     *         required=false,
     *     ),
     *     @OA\Response(response="200", description="Busca os Clietes conforme o que for preenchido"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
    public function search(Request $request)
    {
        $cliente = $this->service->search($request);

        return ['status' => true, "messages" => Geral::CLIENTE_ENCONTRADOS, "clientes" => $cliente];
    }

    /**
     * @OA\Put(
     *     tags={"Cliente"},
     *     path="/cliente/atualizar/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         description="Cliete id",
     *         in="/atualizar/{id}",
     *         required=true,
     *         @OA\Schema(
     *              type="integer",
     *              format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="nome",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="cpf",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="sexo",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="data_nascimento",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="edereco",
     *         required=false,
     *     ),
     *     @OA\Response(response="200", description="Atualiza as informações do Cliente"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     *     @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function update(ClienteRequest $request, $id)
    {
        $endereco = $this->endService->update($request['endereco']);
        $cliente = $this->service->update($request, $id);

        return ['status' => true, 'message' => Geral::CLIENTE_ATUALIZADO, "cliente" => $cliente];
    }

    /**
     * @OA\Delete(
     *     tags={"Cliente"},
     *     path="/cliete/deletar/{id}",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cliete id",
     *          in="/deletar/{id}",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="Deleta o cliete ou Retorna que o mesmo não foi encontrado"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
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
