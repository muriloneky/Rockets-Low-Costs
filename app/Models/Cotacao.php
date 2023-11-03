<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lancamento;

class Cotacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_do_foguete',
        'esta_ativo',
        'custo_por_lancamento',
        'imagem',
        'margem_para_lucro',
        'valor_do_lancamento',
        'lancamento_id',
    ];

    public function lancamento()
    {
        return $this->belongsTo(Lancamento::class, "lancamento_id");
    }
}
