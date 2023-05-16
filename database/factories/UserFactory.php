<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'nm_usuario' => fake()->name(),
            'cd_email' => fake()->unique()->safeEmail(),
            'cd_senha' => Hash::make(Str::random()),
            'ic_admin' => $this->faker->randomElement([true, false]),
        ];
    }
}
