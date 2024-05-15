<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Noticias;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    public function index()
    {
        //$noticias = DB::select('select * from noticias');
        $noticias = Noticias::all();
        $categorias = Categorias::all();
        $usuarios = Usuarios::all();
        return view('noticias.index', compact('noticias', 'categorias', 'usuarios'));
    }

    public function cadastrar()
    {
        $categorias = Categorias::all();
        $usuarios = Usuarios::all();
        return view('noticias.cadastrar', compact('categorias', 'usuarios'));
    }

    public function store(Request $request)
    {
        $noticias = [
            'noticia' => $request->noticia,
            'img' => 'teste.png',
            'usuario_id' => $request->usuario_id,
            'categoria_id' => $request->categoria_id
        ];

        /* Auth::Usuarios()->id */
        Noticias::create($noticias);

        return redirect()->route('noticias.index')
                         ->with('success', 'Salvo com sucesso');
    }

    public function excluir($id)
    {
        $noticia = Noticias::find($id);
        if (!$noticia) {
            return redirect()->route('noticias.index')
                             ->with('error', 'Noticia não existe!');
        }
        $noticia->delete();
        return redirect()->route('noticias.index')
                         ->with('success', 'Apagou com Sucesso!');
    }

    public function editar($id)
    {
        $noticia = Noticias::find($id);
        if (!$noticia) {
            return redirect()->route('noticias.index')
                             ->with('error', 'Noticia não existe!');
        }

        $categorias = Categorias::all();
        $usuarios = Usuarios::all();
        return view('noticias.editar', compact('noticia', 'categorias', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticias::find($id);
        if (!$noticia) {
            return redirect()->route('noticias.index')
                             ->with('error', 'Noticia não existe!');
        }

        $noticia->update([
            'noticia' => $request->noticia,
            'usuario_id' => $request->usuario_id,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('noticias.index')
                         ->with('success', 'Atualizou com Sucesso!');
    }
}
