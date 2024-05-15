@extends('template.base')
@section('titulo')
    <span>Categorias</span> {{-- mudar no CategoriaController --}}
@endsection

@section('btn-base')
    <a class="nav-link active" href="/categorias/cadastrar">Cadastrar</a>
@endsection


@section('conteudo')
    @include('components.alerts')

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th style="width: 40px" scope="col">#</th>
                <th scope="col">Nome</th>
                <th style="width: 200px" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $cat)
                <tr>
                    <th scope="row">{{ $cat->id }}</th>
                    <td>{{ $cat->nome }}</td>
                    <td>
                        {{-- Botao de Edição  --}}
                        <a href="/categorias/editar/{{ $cat->id }}" type="button"
                            class="btn btn-outline-secondary">Editar</a>
                        {{-- Botao de Deletar --}}
                        <a href="/categorias/excluir/{{ $cat->id }}" type="button"
                            class="btn btn-outline-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
