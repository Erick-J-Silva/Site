@extends('template.base')
@section('titulo')
    <span>Noticias</span>
@endsection
@section('btn-base')
    <a class="nav-link active" href="/noticias/cadastrar">Cadastrar</a>
@endsection

@section('conteudo')
    @include('components.alerts')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th style="width: 40px" scope="col">#</th>
                <th scope="col">Notícia</th>
                <th scope="col">Categoria</th>
                <th scope="col">Autor</th>
                <th style="width: 200px" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $not)
                @php
                    $categoria = $categorias->where('id', $not->categoria_id)->first();
                    $autor = $usuarios->where('id', $not->usuario_id)->first();
                @endphp
                <tr>
                    <th scope="row">{{ $not->id }}</th>
                    <td>{{ $not->noticia }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>
                        {{-- Botao de Edição  --}}
                        <a href="/noticias/editar/{{ $not->id }}" type="button"
                            class="btn btn-outline-secondary">Editar</a>
                        {{-- Botao de Deletar --}}
                        <a href="/noticias/excluir/{{ $not->id }}" type="button"
                            class="btn btn-outline-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
