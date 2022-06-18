<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneroService;

class GeneroController extends Controller
{
    private $genero_service;

    public function __construct(GeneroService $genero_service) 
    {
        $this->genero_service = $genero_service;
    }

    public function get()
    {
        return $this->genero_service->get();
    }
}
