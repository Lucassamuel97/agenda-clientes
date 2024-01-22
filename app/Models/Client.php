<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'saldo',
        'cpf',
        'rg',
        'data_nascimento'
    ];

    public function getDataNascimentoformatada()
    {
        return Carbon::parse($this->data_nascimento)->format('d/m/Y');
    }
}
