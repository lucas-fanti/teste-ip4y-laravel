<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'cpf',
        'nome',
        'sobrenome',
        'data_nascimento',
        'email',
        'genero'
    ];
}
