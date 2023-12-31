<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Services\EstadoService;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    protected $service;

    public function __construct(EstadoService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      tags={"Estado"},
     *      path="/estado/select",
     *      @OA\Response(response="200", description="Apreseta todos os Estados"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     *
     * @return Estado
     */
    public function select()
    {
        $query = Estado::all();

        return ['status' => true, "estados" => $query];
    }
}
