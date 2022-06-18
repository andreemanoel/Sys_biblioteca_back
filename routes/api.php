<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('usuario', '\App\Http\Controllers\UsuarioController@store');
Route::put('usuario/{id}', '\App\Http\Controllers\UsuarioController@update');
Route::delete('usuario/{id}', '\App\Http\Controllers\UsuarioController@delete');
Route::get('usuario', '\App\Http\Controllers\UsuarioController@get');
Route::get('usuario/{id}', '\App\Http\Controllers\UsuarioController@getUser');

Route::post('livro', '\App\Http\Controllers\LivroController@store');
Route::put('livro/{id}', '\App\Http\Controllers\LivroController@update');
Route::delete('livro/{id}', '\App\Http\Controllers\LivroController@delete');
Route::get('livro', '\App\Http\Controllers\LivroController@get');
Route::get('livro/{id}', '\App\Http\Controllers\LivroController@getLivro');

Route::get('genero', '\App\Http\Controllers\GeneroController@get');