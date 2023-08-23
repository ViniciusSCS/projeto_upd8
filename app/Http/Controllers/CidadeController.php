<?php

namespace App\Http\Controllers;

use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected $service;

    public function __construct(CidadeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      tags={"Cidade"},
     *      path="/select/{codigo_uf}",
     *      @OA\Parameter(
     *          name="codigo_uf",
     *          description="Código UF do Estado",
     *          in="/select/{codigo_uf}",
     *          required=true,
     *      ),
     *      @OA\Response(response="200", description="Apreseta todas as cidades relacionnadas ao Codigo UF do Estado "),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     */
    public function selectPorEstado($codigo_uf)
    {
        $cidadePorEstado = $this->service->selectPorEstado($codigo_uf);

        return ['status' => true, "cidades" => $cidadePorEstado];
    }
}
