<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Composicao
 *
 * @property int $id
 * @property int|null $composicao_ref
 * @property string|null $codigo_sinapi
 * @property string|null $descricao_sinapi
 * @property string|null $codigo_nbr
 * @property string|null $descricao_nbr
 * @property string|null $unidade_medida
 * @property string|null $valor_consolidado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Composicao|null $composicaoReferencia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Insumo> $insumos
 * @property-read int|null $insumos_count
 * @property-read \App\Models\Nbr|null $nbr
 * @property-read \App\Models\Sinapi|null $sinapi
 * @method static \Database\Factories\ComposicaoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCodigoNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCodigoSinapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereComposicaoRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereDescricaoNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereDescricaoSinapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereUnidadeMedida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereValorConsolidado($value)
 * @mixin \Eloquent
 */
class Composicao extends Model
{
    use HasFactory;

    protected $table = 'composicoes';

    protected $fillable = [
        'composicao_ref',
        'codigo_sinapi',
        'codigo_nbr',
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

    /**
     * Get all of the insumos for the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function insumos(): HasManyThrough
    {
        return $this->hasManyThrough(
            Insumo::class,
            InsumoComposicao::class,
            'composicao_id',
            'id',
            'id',
            'insumo_id',
        );
    }
}
