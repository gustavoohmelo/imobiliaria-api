<?php

namespace Database\Seeders;

use App\Models\Proprietario;
use Illuminate\Database\Seeder;

class ProprietariosSeeder extends Seeder
{
    /**
     * Executa o seeder para criar proprietários de teste
     */
    public function run(): void
    {
        Proprietario::create([
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
            'telefone' => '(11) 9999-9999',
        ]);

        Proprietario::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@example.com',
            'telefone' => '(11) 8888-8888',
        ]);

        // Adiciona mais 8 proprietários usando factory
        Proprietario::factory()->count(8)->create();
    }
}