<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmprestimoService;

class EmprestimoController extends Controller
{
    private $emprestimo_service;

    public function __construct(EmprestimoService $emprestimo_service) 
    {
        $this->emprestimo_service = $emprestimo_service;
    }

    public function store(Request $request)
    {
        return $this->emprestimo_service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->emprestimo_service->update($request, $id);
    }

    public function get()
    {
        return $this->emprestimo_service->get();
    }

    public function getUsuarioEmprestimo($id)
    {
        return $this->emprestimo_service->getUsuarioEmprestimo($id);
    }
}
