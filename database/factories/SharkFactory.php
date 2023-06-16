<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SharkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Prueba',
            'email' => 'asd@gmail.com',
            'shark_level' => $this->faker->numberBetween(1,3),
        ];
    }
}
