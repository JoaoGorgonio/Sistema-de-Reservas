<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Helpers\ReservationGenerator;

class ReservationsSeeder extends Seeder
{
    public function run()
    {
        $generator = new ReservationGenerator();
        $generator->generateReservations(15);
    }
}
