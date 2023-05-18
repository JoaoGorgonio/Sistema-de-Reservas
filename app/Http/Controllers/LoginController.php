<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

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
        return Response::json([
            'cd_token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->pull('cd_token');
        return redirect()->route('login');
    }
}
