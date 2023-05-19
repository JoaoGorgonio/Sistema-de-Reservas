<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail(session('user')['cd_usuario']);
        $tables = $this->getFilteredTables($request);
        return view('system.reservation', compact('user', 'tables'));
    }

    public function store(Request $request) {
        $user = $request->session()->get('user');
        $reservation = Reservation::create([
            'cd_usuario' => $user['cd_usuario'],
            'cd_mesa' => $request->table,
            'hr_reserva' => $request->hour,
            'dt_reserva' => $request->date,
        ]);

        if (!$reservation) {
            return response([
                'message' => 'Não foi possível realizar a reserva.'
            ], 402);
        }

        return response([
            'message' => 'Reserva criada com sucesso!'
        ], 200);
    }

    public function checkTablesAvailability(Request $request)
    {
        $tables = $this->getFilteredTables($request);
        $html = view('system.reservation', compact('tables'))->render();
        return $html;
    }

    private function getFilteredTables(Request $request)
    {
        $dateReservation = $request->input('date_reservation', Carbon::now()->toDateString());
        $hourReservation = $request->input('hour_reservation', '18:00:00');

        return Table::whereDoesntHave('reservations', function ($query) use ($dateReservation, $hourReservation) {
            $query->where('dt_reserva', $dateReservation)
                ->where('hr_reserva', $hourReservation);
        })->get();
    }
}
