@extends('template.base')
@section('titulo')
    <span>Categorias - Editar</span>
@endsection

@section('btn-base')
    <a class="nav-link active" href="/categorias">Voltar</a>
@endsection

@section('conteudo')
    <form method="POST"
          action="{{route('categorias.update', $categoria->id)}}">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome da Categoria</label>
            <input name="nome" type="text" value="{{ $categoria->nome }}" class="form-control" required>
            <small class="form-text text-muted">Este campo é obrigatório.</small>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
