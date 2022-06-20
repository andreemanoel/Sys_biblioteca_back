<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioEmprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'data_devolucao',
        'status',
    ];

    public function usuario() {
        return $this->hasOne(Usuario::class, 'id','usuario_id');
    }

    public function livro() {
        return $this->hasOne(Livro::class, 'id','livro_id');
    }
}
