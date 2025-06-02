<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações (cria a tabela imoveis)
     */
    public function up(): void
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id(); // ID auto-incremento
            $table->foreignId('proprietario_id')->constrained('proprietarios')->onDelete('cascade'); // Chave estrangeira para proprietário
            $table->string('endereco'); // Endereço do imóvel
            $table->string('cidade'); // Cidade
            $table->string('estado'); // Estado
            $table->decimal('valor', 10, 2); // Valor do imóvel (10 dígitos, 2 decimais)
            $table->integer('quartos'); // Número de quartos
            $table->integer('banheiros'); // Número de banheiros
            $table->text('descricao')->nullable(); // Descrição (opcional)
            $table->timestamps(); // Colunas created_at e updated_at
        });
    }

    /**
     * Reverte as migrações (dropa a tabela)
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};