@extends('template.base')
@section('titulo')
    <span>Usuários - Cadastrar</span>
@endsection

@section('btn-base')
    <a class="nav-link active" href="/usuarios">Voltar</a>
@endsection

@section('conteudo')
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <div class="form-group">
            <label>Nome do usuário</label>
            <input name="nome" type="text" class="form-control" required>
            <small class="form-text text-muted">Este campo é obrigatório.</small>
            <label>E-mail</label>
            <input name="email" type="email" class="form-control" required>
            <small class="form-text text-muted">Este campo é obrigatório.</small>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
