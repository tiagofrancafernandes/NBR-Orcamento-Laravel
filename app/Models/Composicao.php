<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Composicao extends Model
{
    use HasFactory;

    protected $table = 'composicoes';

    protected $fillable = [
        'composicao_ref',
        'codigo_sinapi',
        'descricao_sinapi',
        'codigo_nbr',
        'descricao_nbr',
        'unidade_medida',
        'valor_consolidado',
    ];

    /**
     * Get the composicaoRef that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composicaoReferencia(): BelongsTo
    {
        return $this->belongsTo(Composicao::class, 'composicao_ref', 'id');
    }

    /**
     * Get the composicaoRef that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sinapi(): BelongsTo
    {
        return $this->belongsTo(Sinapi::class, 'codigo_sinapi', 'codigo');
    }

    /**
     * Get the composicaoRef that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nbr(): BelongsTo
    {
        return $this->belongsTo(Nbr::class, 'codigo_nbr', 'codigo');
    }
}
