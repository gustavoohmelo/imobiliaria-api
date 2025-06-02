<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    /**
     * Os atributos que são mass assignable (preenchíveis em massa)
     *
     * @var array
     */
    protected $fillable = [
        'proprietario_id',
        'endereco',
        'cidade',
        'estado',
        'valor',
        'quartos',
        'banheiros',
        'descricao',
    ];

    /**
     * Define o relacionamento "pertence a" com Proprietario
     * Cada imóvel pertence a um proprietário
     */
    public function proprietario(): BelongsTo
    {
        return $this->belongsTo(Proprietario::class);
    }
}