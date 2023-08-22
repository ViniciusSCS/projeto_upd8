<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'cpf',
        'sexo',
        'endereco_id',
        'data_nascimento',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }
}
