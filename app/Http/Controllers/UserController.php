<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Rules\ValidCpf;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->merge(['cpf' => preg_replace('/[^0-9]/', '', $request->cpf)]);
        
        $request->validate([
            'cpf' => ['required', 'size:11', 'unique:usuarios', new ValidCpf],
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:usuarios',
            'genero' => 'required|in:masculino,feminino',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->merge(['cpf' => preg_replace('/[^0-9]/', '', $request->cpf)]);
        
        $request->validate([
            'cpf' => ['required', 'size:11', 'unique:usuarios,cpf,' . $user->id, new ValidCpf],
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:usuarios,email,' . $user->id,
            'genero' => 'required|in:masculino,feminino',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
    }

    public function sendToAPI()
    {
        $users = User::all();
        $response = Http::post('https://api-teste.ip4y.com.br/cadastro', $users->toArray());

        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'Dados enviados para a API com sucesso.');
        } else {
            return redirect()->route('users.index')->with('error', 'Falha ao enviar os dados para a API.');
        }
    }
}
