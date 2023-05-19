<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('cd_token')) {
            return redirect()->route('reservation');
        }

        return view('system.login-reservation');
    }

}
