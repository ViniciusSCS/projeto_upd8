<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticatorController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->all();

        if (Auth::attempt(['email' => strtolower($data['email']), 'password' => $data['password']])) {
            $user = Auth::user();

            $user = User::find($user->id);
            $token = $user->createToken('JWT')->plainTextToken;

            return ['status' => true, 'message' => Geral::USUARIO_LOGADO, "usuario" => $user, "token" => $token];
        } else {
            return ['status' => false, 'message' => Geral::USUARIO_INCORRETO];
        }
    }

    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return ['status' => true, 'message' => Geral::USUARIO_DESLOGADO];
    }
}
