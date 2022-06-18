<?php

namespace App\Services;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Resources\LivroResource;

class LivroService {

  protected $livro;

  public function __construct(Livro $livro) {
    $this->livro = $livro;
  }
  
  public function store($request) {
    $livro = $this->livro->create($request->all());
    
    return response()->json([
        'message' => 'Livro criado com sucesso!'
    ], 201);
  }

  public function update($request, $id) {
    $livro = $this->livro->where('id', $id)->update($request->all());
    
    if($livro) {
      return response()->json([
          'message' => 'Livro atualizado com sucesso!',
      ], 201);
    }
  }

  public function delete($id) {
    $data = $this->livro->find($id);
    if($data){
        $data->delete();
        return response()->json([
            'message' => 'Successfully deleted livro'
        ], 200);
    }

    return response()->json([
        'message' => 'user does not exist'
    ], 404);
  }

  public function get() {
    $livros = $this->livro->with('genero')->get();
    return response()->json(LivroResource::collection($livros));
  }

  public function getLivro($id) {
    $livro = $this->livro->find($id);
    return $livro;
  }

}