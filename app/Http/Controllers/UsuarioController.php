<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    private $user_service;

    public function __construct(UsuarioService $user_service) 
    {
        $this->user_service = $user_service;
    }

    public function store(Request $request)
    {
        return $this->user_service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->user_service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->user_service->delete($id);
    }

    public function get()
    {
        return $this->user_service->get();
    }

    public function getUser($id)
    {
        return $this->user_service->getUser($id);
    }
}
