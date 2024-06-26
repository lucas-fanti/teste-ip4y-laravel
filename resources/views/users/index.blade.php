@extends('layout')

@section('content')
    <h1>Lista de Usuários</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('users.sendToAPI') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-secondary">Enviar Dados para API</button>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->cpf }}</td>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->sobrenome }}</td>
                    <td>{{ $user->data_nascimento }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->genero }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
