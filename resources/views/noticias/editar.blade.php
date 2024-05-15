@extends('template.base')
@section('titulo')
    <span>Noticias - Editar</span>
@endsection

@section('btn-base')
    <a class="nav-link active" href="/noticias">Voltar</a>
@endsection

@section('conteudo')
    <form method="POST" action="{{ route('noticias.update', $noticia->id) }}">

        @csrf
        @method('PATCH')

        <div class="form-group">
            <label>Notícia *</label>
            <input name="noticia" type="text" value="{{ $noticia->noticia }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Categoria *</label>
            <select class="form-control" name="categoria_id" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @php if ($categoria->id == $noticia->categoria_id) { echo 'selected'; } @endphp>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Autor *</label>
            <select class="form-control" name="usuario_id" required>
                @foreach ($usuarios as $autor)
                    <option value="{{ $autor->id }}" @php if ($autor->id == $noticia->usuario_id) { echo 'selected'; } @endphp>{{ $autor->nome }}</option>
                @endforeach
            </select>
        </div>

        @if (session('sucess'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
