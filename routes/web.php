<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Base
Route::get('/', [CategoriaController::class, 'index']);

//Categoria
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

Route::get('/categorias/cadastrar', [CategoriaController::class, 'cadastrar']);

Route::post('/categorias/cadastrar/store', [CategoriaController::class, 'store'])->name('categorias.store');;

Route::get('/categorias/excluir/{id}', [CategoriaController::class, 'excluir']);

Route::get('/categorias/editar/{id}', [CategoriaController::class, 'editar']);

Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');

//Noticia
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');;

Route::get('/noticias/cadastrar', [NoticiaController::class, 'cadastrar']);

Route::post('/noticias/cadastrar/store', [NoticiaController::class, 'store'])->name('noticias.store');;

Route::get('/noticias/excluir/{id}', [NoticiaController::class, 'excluir']);

Route::get('/noticias/editar/{id}', [NoticiaController::class, 'editar']);

Route::patch('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');

//Usuario
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/usuarios/cadastrar/store', [UsuarioController::class, 'store'])->name('usuarios.store');;

Route::get('/usuarios/excluir/{id}', [UsuarioController::class, 'excluir']);

Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'editar']);

Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');


Route::fallback(function (Request $request) {
    // Obter o endereço IP do cliente
    $ip = $request->ip();
    return redirect()->route('/categorias', compact('ip'));
});
