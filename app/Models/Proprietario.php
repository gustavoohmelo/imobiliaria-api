<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proprietario extends Model
{
    use HasFactory;

    protected $table = 'proprietarios';

    /**
     * Os atributos que são mass assignable (preenchíveis em massa)
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];

    /**
     * Define o relacionamento "um para muitos" com Imovel
     * Um proprietário pode ter vários imóveis
     */
    public function imoveis(): HasMany
    {
        return $this->hasMany(Imovel::class);
    }
}