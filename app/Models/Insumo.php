<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Insumo
 *
 * @property int $id
 * @property string|null $codigo_sinapi
 * @property string|null $codigo_nbr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $preco
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Composicao> $composicoes
 * @property-read int|null $composicoes_count
 * @property-read mixed $custo
 * @property-read mixed $descricao_nbr
 * @property-read mixed $descricao_sinapi
 * @property-read mixed $unidade_medida
 * @property-read \App\Models\Nbr|null $nbr
 * @property-read \App\Models\Sinapi|null $sinapi
 * @method static \Database\Factories\InsumoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo whereCodigoNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo whereCodigoSinapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Insumo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperInsumo
 */
class Insumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_sinapi',
        'codigo_nbr',
    ];

    protected $appends = [
        'descricaoSinapi',
        'descricaoNbr',
        'custo',
        'unidadeMedida',
    ];

    /**
     * Get the sinapi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sinapi(): BelongsTo
    {
        return $this->belongsTo(Sinapi::class, 'codigo_sinapi', 'codigo');
    }

    /**
     * Get the nbr
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nbr(): BelongsTo
    {
        return $this->belongsTo(Nbr::class, 'codigo_nbr', 'codigo');
    }

    /**
     * The composicoes that belong to the Insumo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function composicoes(): BelongsToMany
    {
        return $this->belongsToMany(Composicao::class, 'insumos_composicoes', 'insumo_id', 'composicao_id');
    }

    public function getDescricaoSinapiAttribute()
    {
        if (!$this?->codigo_sinapi) {
            return null;
        }

        return Sinapi::getByCodigo($this?->codigo_sinapi)?->descricao;
    }

    public function getDescricaoNbrAttribute()
    {
        if (!$this?->codigo_nbr) {
            return null;
        }

        return Nbr::getByCodigo($this?->codigo_nbr)?->descricao;
    }

    public function getCustoAttribute()
    {
        if (!$this?->codigo_sinapi) {
            return null;
        }

        $custo = Sinapi::getByCodigo($this?->codigo_sinapi)?->custo;

        return $custo ? str_replace(',', '.', (string) $custo) : null;
    }

    public function getUnidadeMedidaAttribute()
    {
        if (!$this?->codigo_sinapi) {
            return null;
        }

        return Sinapi::getByCodigo($this?->codigo_sinapi)?->unidade_medida;
    }
}
