<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioService {

  protected $user;

  public function __construct(Usuario $user) {
    $this->user = $user;
  }
  
  public function store($request) {
    $user = $this->user->create($request->all());
    
    return response()->json([
        'message' => 'Usuario criado com sucesso!'
    ], 201);
  }

  public function update($request, $id) {
    $user = $this->user->where('id', $id)->update($request->all());
    
    if($user) {
      return response()->json([
          'message' => 'Usuario atualizado com sucesso!',
      ], 201);
    }
  }

  public function delete($id) {
    $data = $this->user->find($id);
    if($data){
        $data->delete();
        return response()->json([
            'message' => 'Successfully deleted user'
        ], 200);
    }

    return response()->json([
        'message' => 'user does not exist'
    ], 404);
  }

  public function get() {
    $user = $this->user->get();
    return $user;
  }

  public function getUser($id) {
    $user = $this->user->find($id);
    return $user;
  }

}