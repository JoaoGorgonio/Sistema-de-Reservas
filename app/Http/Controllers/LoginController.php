<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('cd_email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->cd_senha)) {
            return response([
                'message' => 'Acesso inválido.'
            ], 401);
        }

        $token = $user->createToken('token_name', ['cd_token'])->plainTextToken;
        $request->session()->put('cd_token', $token);
        $request->session()->put('user', $user->toArray()); 
        return Response::json([
            'cd_token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->pull('cd_token');
        $request->session()->pull('user');
        return redirect()->route('login');
    }
}
