<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categorias::all();
        return view('categorias.index'/* 'categorias.index' */, compact('categorias'));
    }

    public function cadastrar() {
        return view('categorias.cadastrar');
    }

    public function store(Request $request) {
        Categorias::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Salvo com sucesso');
    }

    public function excluir($id) {
        $categoria = Categorias::find($id);
        if(!$categoria) {
            return redirect()->route('categorias.index')
                             ->with('error', 'Categoria não existe!');
        }
        $categoria->delete();
        return redirect()->route('categorias.index')
                         ->with('success', 'Apagou com sucesso!');
    }

    public function editar($id) {
        $categoria = Categorias::find($id);
        if(!$categoria) {
            return redirect()->route('categorias.index')
                             ->with('error', 'Categoria não existe!');
        }

        return view('categorias.editar', compact('categoria'));
    }

    public function update(Request $request, $id) {
        $categoria = Categorias::find($id);
        if(!$categoria) {
            return redirect()->route('categorias.index')
                             ->with('error', 'Categoria não existe!');
        }

        $categoria->nome = $request->nome;

        $categoria->save();
        return redirect()->route('categorias.index')
                         ->with('success', 'Atualizou com Sucesso!');
    }
}
