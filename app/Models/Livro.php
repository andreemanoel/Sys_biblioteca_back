<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'autor',
        'genero_id',
        'situacao',
    ];

    public function genero() {
        return $this->hasOne(Genero::class, 'id','genero_id');
    }
}
