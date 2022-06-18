<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LivroService;

class LivroController extends Controller
{
    private $livro_service;

    public function __construct(LivroService $livro_service) 
    {
        $this->livro_service = $livro_service;
    }

    public function store(Request $request)
    {
        return $this->livro_service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->livro_service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->livro_service->delete($id);
    }

    public function get()
    {
        return $this->livro_service->get();
    }

    public function getLivro($id)
    {
        return $this->livro_service->getLivro($id);
    }
}
