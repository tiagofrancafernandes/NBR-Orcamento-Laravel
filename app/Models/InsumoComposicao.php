<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\InsumoComposicao
 *
 * @property int $composicao_id
 * @property int $insumo_id
 * @property string|null $coeficiente
 * @property-read \App\Models\Composicao $composicao
 * @property-read \App\Models\Insumo $insumo
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao whereCoeficiente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao whereComposicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsumoComposicao whereInsumoId($value)
 * @mixin \Eloquent
 */
class InsumoComposicao extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $table = 'insumos_composicoes';

    protected $fillable = [
        'composicao_id',
        'insumo_id',
        'coeficiente',
    ];

    /**
     * Get the composicao that owns the InsumoComposicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composicao(): BelongsTo
    {
        return $this->belongsTo(Composicao::class, 'composicao_id', 'id');
    }

    /**
     * Get the insumo that owns the InsumoComposicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class, 'insumo_id', 'id');
    }
}
