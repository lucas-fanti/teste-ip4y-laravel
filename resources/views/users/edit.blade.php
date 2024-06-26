@extends('layout')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $user->cpf) }}" required>
            @error('cpf')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Sobrenome:</label>
            <input type="text" name="sobrenome" class="form-control" value="{{ old('sobrenome', $user->sobrenome) }}" required>
            @error('sobrenome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', $user->data_nascimento) }}" required>
            @error('data_nascimento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gênero:</label>
            <select name="genero" class="form-control" required>
                <option value="masculino" {{ old('genero', $user->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="feminino" {{ old('genero', $user->genero) == 'feminino' ? 'selected' : '' }}>Feminino</option>
            </select>
            @error('genero')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
