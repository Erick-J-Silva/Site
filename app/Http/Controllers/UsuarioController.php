<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function cadastrar() {
        return view('usuarios.cadastrar');
    }

    public function store(Request $request) {
        Usuarios::create($request->all());

        return redirect()->route('usuarios.index')
                         ->with('success', 'Salvo com sucesso');
    }

    public function excluir($id) {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')
                             ->with('error', 'Usuário não existe!');
        }
        if (!$usuario) {
            return redirect()->route('usuarios.index')
                             ->with('error', 'Usuário não existe!');
        }
        $usuario->delete();
        return redirect()->route('usuarios.index')
                         ->with('success', 'Apagou com sucesso!');
    }

    public function editar($id) {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')
                             ->with('error', 'Usuário não existe!');
        }

        return view('usuarios.editar', compact('usuario'));
    }

    public function update(Request $request, $id) {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')
                             ->with('error', 'Usuário não existe!');
        }

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        $usuario->save();
        return redirect()->route('usuarios.index')
                         ->with('success', 'Atualizou com Sucesso!');
    }
}
