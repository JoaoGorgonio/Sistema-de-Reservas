<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'cd_email' => $request->email,
            'cd_senha' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token_name', ['cd_token']);
            $cdTokenValue = $token->plainTextToken;
            return response()->json($cdTokenValue, 200);
        }

        return response()->json('Usuário inválido', 401);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()?->delete();
        return response()->json(['message' => 'Logout realizado com sucesso.'], 200);
    }
}
