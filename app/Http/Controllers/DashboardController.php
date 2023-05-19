<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(session('user')['cd_usuario']);
        $reservations = Reservation::orderBy('cd_mesa')->get();

        return view('dashboard.view-reservation', compact('user', 'reservations'));
    }
}
