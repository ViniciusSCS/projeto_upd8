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

    public function select()
    {
        $query = Estado::all();

        return ['status' => true, "estados" => $query];
    }
}
