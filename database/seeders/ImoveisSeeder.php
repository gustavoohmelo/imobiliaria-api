<?php

namespace Database\Seeders;

use App\Models\Imovel;
use App\Models\Proprietario;
use Illuminate\Database\Seeder;

class ImoveisSeeder extends Seeder
{
    /**
     * Executa o seeder para criar imóveis de teste
     */
    public function run(): void
    {
        // Obtém todos os proprietários
        $proprietarios = Proprietario::all();

        // Para cada proprietário, cria 2 imóveis
        $proprietarios->each(function ($proprietario) {
            Imovel::factory()->count(2)->create([
                'proprietario_id' => $proprietario->id,
            ]);
        });
    }
}