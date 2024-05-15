@extends('template.base')
@section('titulo')
    <span>Usuários</span>
@endsection

@section('btn-base')
    <a class="nav-link active" href="/usuarios/cadastrar">Cadastrar</a>
@endsection


@section('conteudo')
    @include('components.alerts')

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th style="width: 40px" scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th style="width: 200px" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- Botao de Edição  --}}
                        <a href="/usuarios/editar/{{ $user->id }}" type="button"
                            class="btn btn-outline-secondary">Editar</a>
                        {{-- Botao de Deletar --}}
                        <a href="/usuarios/excluir/{{ $user->id }}" type="button"
                            class="btn btn-outline-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
