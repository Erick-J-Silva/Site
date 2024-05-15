@extends('template.base')
@section('titulo')
    <span>Notícias - Cadastrar</span>
@endsection

@section('btn-base')
    <a class="nav-link active" href="/noticias">Voltar</a>
@endsection

@section('conteudo')
    <form method="POST" action="{{ route('noticias.store') }}">
        @csrf
        <div class="form-group">
            <label>Notícia *</label>
            <input name="noticia" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Categoria *</label>
            <select class="form-control" name="categoria_id" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $categoria)
                   <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Autor *</label>
            <select class="form-control" name="usuario_id" required>
                <option value="">Selecione...</option>
                @foreach($usuarios as $autor)
                   <option value="{{$autor->id}}">{{$autor->nome}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
