<?php

namespace App\Services;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroService {

  protected $genero;

  public function __construct(Genero $genero) {
    $this->genero = $genero;
  }

  public function get() {
    $generos = $this->genero->get();
    return $generos;
  }

}