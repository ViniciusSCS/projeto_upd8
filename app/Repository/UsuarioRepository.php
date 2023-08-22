<?php

namespace App\Repository;

use App\Models\User;

class UsuarioRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ]);
    }

    public function me($id)
    {
        return User::with('user_type')
            ->where('id', $id)
            ->get();
    }
}
