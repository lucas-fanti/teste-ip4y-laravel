@extends('layout')

@section('content')
    <h1>Cadastrar Usuário</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" required>
            @error('cpf')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Sobrenome:</label>
            <input type="text" name="sobrenome" class="form-control" value="{{ old('sobrenome') }}" required>
            @error('sobrenome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}" required>
            @error('data_nascimento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gênero:</label>
            <select name="genero" class="form-control" required>
                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="feminino" {{ old('genero') == 'feminino' ? 'selected' : '' }}>Feminino</option>
            </select>
            @error('genero')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <button type="reset" class="btn btn-secondary">Recomeçar</button>
    </form>
@endsection
