<?php
namespace App\Helpers;

use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;

class ReservationGenerator
{
    protected $tables;
    protected $schedules;
    protected $users;

    public function __construct()
    {
        // Utilizo o método pluck, para obter apenas o ID, já que não vou necessitar de outros dados
        $this->tables = Table::pluck('cd_mesa')->toArray();
        $this->users = User::pluck('cd_usuario')->toArray();
        $this->schedules = ['18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
    }

    public function generateReservations($numberOfReservations = 15)
    {
        $reservations = [];

        for ($i = 0; $i < $numberOfReservations; $i++) {
            $table = $this->getRandomTable();
            $user = $this->getRandomUser();
            $schedule = $this->getRandomSchedule($table);

            $reservation = [
                'dt_reserva' => Carbon::today()->format('Y-m-d'),
                'hr_reserva' => $schedule,
                'cd_usuario' => $user,
                'cd_mesa' => $table,
            ];

            $reservations[] = $reservation;
        }

        Reservation::insert($reservations);
    }

    protected function getRandomTable()
    {
        return Arr::random($this->tables);
    }

    protected function getRandomUser()
    {
        return Arr::random($this->users);
    }

    protected function getRandomSchedule($tableId)
    {
        $existingSchedules = Reservation::where('cd_mesa', $tableId)->pluck('hr_reserva')->toArray();
        $availableSchedules = array_diff($this->schedules, $existingSchedules);

        if (empty($availableSchedules)) {
            return null;
        }

        return Arr::random($availableSchedules);
    }
}
