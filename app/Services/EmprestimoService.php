<?php

namespace App\Services;

use App\Models\UsuarioEmprestimo;
use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Resources\EmprestimoResource;

class EmprestimoService {

  protected $usuarioEmprestimo;

  public function __construct(UsuarioEmprestimo $usuarioEmprestimo, Livro $livro) {
    $this->usuarioEmprestimo = $usuarioEmprestimo;
    $this->livro = $livro;
  }
  
  public function store($request) {
    $usuarioEmprestimo = $this->usuarioEmprestimo->create($request->all());

    if($usuarioEmprestimo) {
      $retorno = $this->livro->where('id', $request->livro_id)->update(['situacao' => false]);
    }
    
    return response()->json([
        'message' => 'Empréstimo criado com sucesso!'
    ], 201);
  }

  public function update($request, $id) {
    $usuarioEmprestimo = $this->usuarioEmprestimo->where('id', $id)->update($request->all());
    
    if($usuarioEmprestimo) {
      if($request->status == "Devolvido" || $request->status == "Atrasado"){
        $retorno = $this->livro->where('id', $request->livro_id)->update(['situacao' => true]);
      }
      return response()->json([
          'message' => 'Emprestimo atualizado com sucesso!',
      ], 201);
    }
  }

  public function get() {
    $usuarioEmprestimos = $this->usuarioEmprestimo->with('usuario', 'livro')->get();
    return response()->json(EmprestimoResource::collection($usuarioEmprestimos));
  }

  public function getUsuarioEmprestimo($id) {
    $usuarioEmprestimo = $this->usuarioEmprestimo->find($id);
    return $usuarioEmprestimo;
  }

}