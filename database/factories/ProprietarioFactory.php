<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProprietarioFactory extends Factory
{
    /**
     * Define o modelo padrão associado à factory
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}