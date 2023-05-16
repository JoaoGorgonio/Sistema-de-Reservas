<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        User::factory()->create([
            'nm_usuario' => 'Digiliza',
            'cd_email' => 'digiliza@gmail.com',
            'cd_senha' => Hash::make('digiliza123'),
            'ic_admin' => true
        ]);
    }
}
