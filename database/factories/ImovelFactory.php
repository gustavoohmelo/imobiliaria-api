<?php

namespace Database\Factories;

use App\Models\Proprietario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelFactory extends Factory
{
    /**
     * Define o modelo padrão associado à factory
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proprietario_id' => Proprietario::factory(), // Cria um proprietário automaticamente
            'endereco' => $this->faker->address,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->stateAbbr,
            'valor' => $this->faker->numberBetween(100000, 1000000),
            'quartos' => $this->faker->numberBetween(1, 5),
            'banheiros' => $this->faker->numberBetween(1, 3),
            'descricao' => $this->faker->paragraph,
        ];
    }
}