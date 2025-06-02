<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações (cria a tabela proprietarios)
     */
    public function up(): void
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id(); // Coluna de ID auto-incremento
            $table->string('nome'); // Nome do proprietário
            $table->string('email')->unique(); // Email (único)
            $table->string('telefone'); // Telefone
            $table->timestamps(); // Colunas created_at e updated_at
        });
    }

    /**
     * Reverte as migrações (dropa a tabela)
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};